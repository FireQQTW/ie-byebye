# Inspired by https://coderwall.com/p/splmua
require 'rubygems'
require 'bundler/setup'
 
require 'rack'
require 'rack-rewrite'
require 'rack-legacy'
 
public_dir = File.join(Dir.getwd, 'public')

# patch Php from rack-legacy to substitute the original request so
# WP's redirect_canonical doesn't do an infinite redirect of /
module Rack
  module Legacy
    class Php
      def run(env, path)
        config = {"cgi.force_redirect" => 0}
        config.merge! HtAccess.merge_all(path, public_dir) if @htaccess_enabled
        config = config.collect {|(key, value)| "#{key}=#{value}"}
        config.collect! {|kv| ["-d", kv]}

        script, info = *path_parts(path)
        env["SCRIPT_FILENAME"] = script
        env["SCRIPT_NAME"] = script.sub ::File.expand_path(public_dir), ""
        env["REQUEST_URI"] = env["POW_ORIGINAL_REQUEST"] unless env["POW_ORIGINAL_REQUEST"].nil?

        super env, @php_exe, *config.flatten
      end
    end
  end
end

use Rack::Rewrite do
    rewrite %r{(.*)/?}, '$1index.php', :if => lambda{|e|
      File.directory?(File.join(public_dir, e['PATH_INFO']))
    }
    rewrite %r{(.*)?}, lambda {|match, rack_env|
        rack_env["POW_ORIGINAL_REQUEST"] = rack_env["PATH_INFO"]

        if rack_env['PATH_INFO'].include?('assets') or File.exists?(File.join(public_dir, match[1]))
            return match[1]
        else
            return "/index.php" + match[1]
        end
    }
end

use Rack::Legacy::Php, File.join(public_dir)
run Rack::File.new File.join(public_dir)
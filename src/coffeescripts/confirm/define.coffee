 # 
 #  
 #  @authors Casper Lai (casper.lai@sleepingdesign.com)
 #  @date    2014-02-26 16:00:34
 #  @version $Id$
 # 
define ['bootstrap-prompts'], ->
    $(document)
    .on 'click', '.jquery-confirm', (event)->
        event.preventDefault()
        element = $(this)
        confirm '確定執行動作？', (result)->

            if result
                if element.is('a')
                    href = element.prop('href')
                    location.href = href
                else
                    element.closest('form').submit()
                return
        return
    return


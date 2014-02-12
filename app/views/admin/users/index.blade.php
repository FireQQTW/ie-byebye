@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.users'))

@section('main')
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table id="sample-table-1" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</th>
							<th>使用者</th>
							<th>帳號</th>
							<th class="hidden-480">Email</th>
							<th class="hidden-480">狀態</th>
							<th>
								<a href="{{URL::route('admin.users.create')}}" class="btn btn-info btn-xs pull-right">
									<i class="icon-plus align-top bigger-110 icon-on-right"></i>
									新增
								</a>
							</th>
						</tr>
					</thead>

					<tbody>
						@foreach($users as $user)
						<tr>
							<td class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>
								{{{ $user->name }}}
							</td>
							<td>
								{{{ $user->username }}}
							</td>
							<td>
								{{{ $user->email }}}
							</td>
							<td>
								{{ HTML::decode('<span class="label label-sm '.$user->getStatusCss().'">'.$user->getStatus().'</span>') }}
							</td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									{{Form::open(array('method'	=> 'DELETE', 'route' =>	array('admin.users.destroy', $user->id), 'class' => 'btn-group'))}}
										{{HTML::decode(link_to_route('admin.users.edit', '<i class="icon-edit bigger-120"></i>編輯', array($user->id), array('class' => 'btn btn-xs btn-success')))}}
										{{HTML::ButtonWithIcon('<i class="icon-trash bigger-120"></i>刪除', array('class' => 'btn btn-xs btn-danger', 'type'	=>	'submit')) }}
										{{HTML::decode(link_to_route('admin.users.assign', '<i class="icon-group bigger-120"></i>群組', array($user->id), array('class' => 'btn btn-xs btn-info')))}}
									{{Form::close()}}
								</div>
								{{Form::open(array('method'	=> 'DELETE', 'route' =>	array('admin.users.destroy', $user->id)))}}
									<div class="visible-xs visible-sm hidden-md hidden-lg">
										<div class="inline position-relative">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
												<i class="icon-cog icon-only bigger-110"></i>
											</button>
												
											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
												<li>

													{{HTML::decode(link_to_route('admin.users.edit', '<span class="green"><i class="icon-edit bigger-120"></i></span>', array($user->id), array('class' => 'tooltip-success', 'data-rel'	=>	'tooltip', 'title'	=>	'編輯')))}}
												</li>
												<li>
													
													{{HTML::decode(link_to_route('admin.users.destroy', '<span class="red"><i class="icon-trash bigger-120"></i></span>', array($user->id), array('class' => 'tooltip-error simulate-submit', 'data-rel'	=>	'tooltip', 'title'	=>	'刪除')))}}
													
												</li>
												<li>

													{{HTML::decode(link_to_route('admin.users.assign', '<span class="blue"><i class="icon-group bigger-120"></i></span>', array($user->id), array('class' => 'tooltip-success', 'data-rel'	=>	'tooltip', 'title'	=>	'群組')))}}
												</li>
											</ul>
										</div>
									</div>
								{{Form::close()}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
		</div><!-- /span -->
	</div><!-- /row -->
@stop
@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.roles'))
@section('asset-js')
	{{Html::script('/js/bootstrap/tooltip.js')}}
@stop
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
							<th>角色名稱</th>
							<th>敘述</th>
							<th class="hidden-480">等級</th>
							<th>
								<a href="{{URL::route('admin.roles.create')}}" class="btn btn-info btn-xs pull-right">
									<i class="icon-plus align-top bigger-110 icon-on-right"></i>
									新增
								</a>
							</th>
						</tr>
					</thead>

					<tbody>
						@foreach($roles as $role)
						<tr>
							<td class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>
								{{{ $role->name }}}
								@if($role->name == Config::get('verify::super_admin'))
									<i class="icon-unlock icon-large" data-rel="tooltip" title="Super Admin 不受權限控制" data-placement="bottom"></i>
								@endif
							</td>
							<td>
								{{{ $role->description }}}
							</td>
							<td>
								{{{ $role->level }}}
							</td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									{{Form::open(array('method'	=> 'DELETE', 'route' =>	array('admin.roles.destroy', $role->id), 'class' => 'btn-group'))}}
										{{HTML::decode(link_to_route('admin.roles.edit', '<i class="icon-edit bigger-120"></i>編輯', array($role->id), array('class' => 'btn btn-xs btn-success')))}}
										{{HTML::decode(link_to_route('admin.roles.destroy', '<i class="icon-trash bigger-120"></i>刪除', array($role->id), array('class' => 'btn btn-xs btn-danger simulate-submit jquery-confirm')))}}
										{{HTML::decode(link_to_route('admin.roles.assign', '<i class="icon-shield bigger-120"></i>權限', array($role->id), array('class' => 'btn btn-xs btn-info')))}}
										
									{{Form::close()}}
								</div>
								{{Form::open(array('method'	=> 'DELETE', 'route' =>	array('admin.roles.destroy', $role->id)))}}
									<div class="visible-xs visible-sm hidden-md hidden-lg">
										<div class="inline position-relative">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
												<i class="icon-cog icon-only bigger-110"></i>
											</button>
												
											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
												<li>

													{{HTML::decode(link_to_route('admin.roles.edit', '<span class="green"><i class="icon-edit bigger-120"></i></span>', array($role->id), array('class' => 'tooltip-success', 'data-rel'	=>	'tooltip', 'title'	=>	'編輯')))}}
												</li>

												<li>
													
													{{HTML::decode(link_to_route('admin.roles.destroy', '<span class="red"><i class="icon-trash bigger-120"></i></span>', array($role->id), array('class' => 'tooltip-error simulate-submit jquery-confirm', 'data-rel'	=>	'tooltip', 'title'	=>	'刪除')))}}
													
												</li>
												<li>
													{{HTML::decode(link_to_route('admin.roles.assign', '<span class="blue"><i class="icon-shield bigger-120"></i></span>', array($role->id), array('class' => 'tooltip-success', 'data-rel'	=>	'tooltip', 'title'	=>	'權限')))}}
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
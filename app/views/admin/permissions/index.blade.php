@extends('layouts.admin')
@section('breadcrumbs', Breadcrumbs::render('admin.permissions'))

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
							<th>
								<a href="{{URL::route('admin.permissions.create')}}" class="btn btn-info btn-xs pull-right">
									<i class="icon-plus align-top bigger-110 icon-on-right"></i>
									新增
								</a>
							</th>
						</tr>
					</thead>

					<tbody>
						@foreach($permissions as $permission)
						<tr>
							<td class="center">
								<label>
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>
								{{{ $permission->name }}}
							</td>
							<td>
								{{{ $permission->description }}}
							</td>
							<td>
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									{{Form::open(array('method'	=> 'DELETE', 'route' =>	array('admin.permissions.destroy', $permission->id), 'class' => 'btn-group'))}}
										{{HTML::decode(link_to_route('admin.permissions.edit', '<i class="icon-edit bigger-120"></i>編輯', array($permission->id), array('class' => 'btn btn-xs btn-success')))}}
										{{HTML::decode(link_to_route('admin.permissions.destroy', '<i class="icon-trash bigger-120"></i>刪除', array($permission->id), array('class' => 'btn btn-xs btn-danger simulate-submit')))}}
									{{Form::close()}}
								</div>
								{{Form::open(array('method'	=> 'DELETE', 'route' =>	array('admin.permissions.destroy', $permission->id)))}}
									<div class="visible-xs visible-sm hidden-md hidden-lg">
										<div class="inline position-relative">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
												<i class="icon-cog icon-only bigger-110"></i>
											</button>
												
											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
												<li>

													{{HTML::decode(link_to_route('admin.permissions.edit', '<span class="green"><i class="icon-edit bigger-120"></i></span>', array($permission->id), array('class' => 'tooltip-success', 'data-rel'	=>	'tooltip', 'title'	=>	'編輯')))}}
												</li>

												<li>
													
													{{HTML::decode(link_to_route('admin.permissions.destroy', '<span class="red"><i class="icon-trash bigger-120"></i></span>', array($permission->id), array('class' => 'tooltip-error simulate-submit', 'data-rel'	=>	'tooltip', 'title'	=>	'刪除')))}}
													
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
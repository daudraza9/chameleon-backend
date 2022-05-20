<div style="width: 140px">
    @can(administrationPermissions['blogManage'])
    <a href="{{route('blog.edit', $row->id)}}" data-toggle="tooltip" title="Edit Blog!" style="margin-right:4px" class="btn btn-outline-primary btn-sm mb-md-1 md-sm-1"><i class="ft-edit"></i></a>
    <a href="JavaScript:void(0);" data-toggle="tooltip" title="Delete Blog!" style="margin-right:4px" class="btn btn-outline-primary btn-sm  mb-md-1 md-sm-1" onclick="delete_blog({{$row->id}});"><i class="ft-delete"></i></a>
    @if ($row->is_featured == 1)
        <input type="checkbox" id="toggle_button_{{$row->id}}" checked onchange="change_status(this,{{$row->id}});" class="switchery" data-toggle="tooltip" title="Change Status!">
    @else
        <input type="checkbox" id="toggle_button_{{$row->id}}" onchange="change_status(this,{{$row->id}});" class="switchery" data-toggle="tooltip" title="Change Status!" >
    @endif
    @endcan
</div>

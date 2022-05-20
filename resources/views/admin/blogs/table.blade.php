<div class="filters-div">
    <div class="row mt-2 mb-2">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <label for="keyword">Keyword Search</label>
                <input id="keyword" type="search" class="form-control" placeholder="Enter Keyword" name="">
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-12">
            <label></label>
            <div class="form-group" style="margin-top: 6px;">
                <button class="btn btn-primary bg-darken-2 text-white" onclick="blogTable.draw();"><i class="ft-search"></i> Search</button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover" id="blog-table">
        <thead class="bg-gradient-x-blue bg-darken-2 text-white">
        <tr>
            <th>Title</th>
            <th>Created At</th>
            <th>Is Featured</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
</div>

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            init_tooltip();
        });

        blogTable = blogsDataTable();
        function blogsDataTable() {

            return $('#blog-table').DataTable({
                "processing": true,
                "serverSide": true,
                "searching": false,
                "pageLength": 50,
                "order":[],
                "drawCallback": function(settings){
                    elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));

                    elems.forEach(function(html) {
                        let switchery = new Switchery(html,{size:'small',secondaryColor: '#ff0000'});
                    });

                    init_tooltip();
                },
                ajax: {
                    url: '{{ route('blog.datatable') }}',
                    data: function (d) {
                        d.keyword = $('#keyword').val();
                    }
                },
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'is_featured', name: 'is_featured'},
                    {data: 'action', name: 'action', searchable:false, orderable:false}
                ],
                bAutoWidth: false,
            });
        }
        let action_callback=function (data) {
            if (data.success == true) {
                // swal("Success!","Customer Archived!","success");
                swalS(data.message);
                blogTable.draw();
            } else {
                swalE(data.message);
            }
        };
        function delete_blog(id) {
            swal({
                title: "Are you sure?",
                text: "Do you really Want to delete This Blog?",
                icon: "warning",
                buttons: {
                    No:{
                        text: "No!",
                        value: false,
                    },
                    Yes: {
                        text: "Yes!",
                        value: true,
                    }
                },
            }).then((willDelete) => {
                if (willDelete){
                    var f = document.createElement("form");
                    f.setAttribute('method', "post");
                    f.setAttribute('action', "{{route('blog.delete')}}");
                    f.setAttribute('id', "data-table-action");
                    var i = document.createElement("input"); //input element, text
                    i.setAttribute('type', "hidden");
                    i.setAttribute('name', "id");
                    i.setAttribute('value', id);
                    var s = document.createElement("input"); //input element, Submit button
                    s.setAttribute('type', "hidden");
                    s.setAttribute('name', "_token");
                    s.setAttribute('id', "csrf-token");
                    s.setAttribute('value', "{{ Session::token() }}");
                    f.appendChild(i);
                    f.appendChild(s);
                    document.getElementsByTagName('body')[0].appendChild(f);
                    formSubmit('data-table-action','','',[],action_callback);
                    document.getElementsByTagName('body')[0].removeChild(f);
                }
            });
        }

        function change_status(obj,id) {

            swal({
                title: "Are you sure?",
                text: "Are you sure you want to "+(($(obj).is(':checked'))? "Activate": "Deactivate")+" this Blog",
                icon: "warning",
                buttons: {
                    No:{
                        text: "No!",
                        value: false,
                    },
                    Yes: {
                        text: "Yes!",
                        value: true,
                    }
                },
            }).then((willDelete) => {
                if (willDelete){
                    var f = document.createElement("form");
                    f.setAttribute('method', "post");
                    f.setAttribute('action', "{{route('blog.change.status')}}");
                    f.setAttribute('id', "data-table-action");
                    var i = document.createElement("input"); //input element, text
                    i.setAttribute('type', "hidden");
                    i.setAttribute('name', "id");
                    i.setAttribute('value', id);
                    var s = document.createElement("input"); //input element, Submit button
                    s.setAttribute('type', "hidden");
                    s.setAttribute('name', "_token");
                    s.setAttribute('id', "csrf-token");
                    s.setAttribute('value', "{{ Session::token() }}");
                    f.appendChild(i);
                    f.appendChild(s);
                    document.getElementsByTagName('body')[0].appendChild(f);
                    formSubmit('data-table-action','','',[],action_callback);
                    document.getElementsByTagName('body')[0].removeChild(f);
                }
            });
        }
    </script>
@endpush

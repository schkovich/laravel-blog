@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/blogs.blogs") }}} :: @parent @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {{{ trans("admin/blogs.blogs") }}}
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{{ URL::to('admin/blogs/create') }}}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span> {{
					trans("admin/modal.new") }}</a>
                </div>
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{ trans("admin/modal.title") }}</th>
            <th>{{ trans("admin/blogs.category") }}</th>
            <th>{{ trans("admin/admin.language") }}</th>
            <th>{{ trans("admin/admin.created_at") }}</th>
            <th>{{ trans("admin/admin.action") }}</th>
        </tr>
        </thead>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">
        var oTable;
        $(document).ready(function () {
            oTable = $('#table').DataTable({
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "pager": "bootstrap",

                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('admin/blogs/data/') }}",
                "columns": [
                    {data: 'title', name: 'Title'},
                    {data: 'category', name: 'category'},
                    {data: 'name', name: 'language'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'actions', orderable: false, searchable: false}
                ]
            });

            var startPosition;
            var endPosition;
            {{--$("#table tbody").sortable({--}}
                {{--cursor: "move",--}}
                {{--start: function (event, ui) {--}}
                    {{--startPosition = ui.item.prevAll().length + 1;--}}
                {{--},--}}
                {{--update: function (event, ui) {--}}
                    {{--endPosition = ui.item.prevAll().length + 1;--}}
                    {{--var navigationList = "";--}}
                    {{--$('#table #row').each(function (i) {--}}
                        {{--navigationList = navigationList + ',' + $(this).val();--}}
                    {{--});--}}
                    {{--$.getJSON("{{ URL::to('admin/blogs/reorder') }}", {--}}
                        {{--list: navigationList--}}
                    {{--}, function (data) {--}}
                        {{--console.debug(data);--}}
                    {{--});--}}
                {{--}--}}
            {{--});--}}
        });
        $.fn.DataTable.ext.errMode = function ( settings, helpPage, message ) {
            console.log(message);
        };
    </script>
@stop

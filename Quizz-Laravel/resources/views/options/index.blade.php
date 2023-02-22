@extends('layouts.app')

@section('principale')
<div class="container-fluid">

    <!-- Page Heading -->
   

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Options de réponses') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('options.create') }}" class="btn btn-primary">
                        <span class="text">{{ __('Créer une nouvelle option') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-option" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>Numero</th>
                                <th>Question</th>
                                <th>Option de réponse</th>
                                <th>Point</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($options as $option)
                            <tr data-entry-id="{{ $option->id }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $option->question->question_text }}</td>
                                <td>{{ $option->option_text}}</td>
                                <td>{{ $option->points}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('options.edit', $option->id) }}" class="btn btn-info">
                                            Modifier
                                        </a>
                                        <form onclick="return confirm('Vous êtes sur(e) ? ')" class="d-inline" action="{{ route('options.destroy', $option->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
<div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel Quizz&copy; Hilel 2023
</div>
@endsection

@push('script-alt')
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = 'delete selected'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('options.mass_destroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });
      if (ids.length === 0) {
        alert('zero selected')
        return
      }
      if (confirm('are you sure ?')) {
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  });
  $('.datatable-option:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endpush
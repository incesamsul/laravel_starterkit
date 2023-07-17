@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5>Set Menu ke role user</h5>
                    <a href="{{ URL::to('/admin/role_menu')}}"><i class="fas fa-arrow-left"> </i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 ">
            <div class="card ">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5>Menu for Role</h5>
                        <button class="btn bg-main text-white btn-simpan">Simpan</button>
                    </div>

                    <div class="connected-sortable droppable-area1">
                        <p><small>Drag and drop item here</small></p>
                        @foreach($role_menu as $row)
                        <div class="card draggable-item" data-id="{{ $row->id }}">
                            <div
                                class=" card-body d-flex flex-row  align-items-center justify-content-start  main-radius">
                                <i class="fas fa-folder mr-2 text-warning"></i>
                                <p class="mb-0">{{ $row->menu->name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 connected-sortable droppable-area2">
            <h5 class="mb-3">List Menu</h5>
            @foreach($menu as $row)
            <div class="card draggable-item" data-id="{{ $row->id }}">
                <div class=" card-body d-flex flex-row  align-items-center justify-content-start  main-radius">
                    <i class="fas fa-folder mr-2 text-warning"></i>
                    <p class="mb-0">{{ $row->name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</section>
@endsection
@section('script')
<script>
$(init);

function init() {
    $(".droppable-area1, .droppable-area2").sortable({
        connectWith: ".connected-sortable",
        stack: '.connected-sortable'
    }).disableSelection();
}


$('.btn-simpan').on('click', function() {
    $(this).html('<i class="fas fa-spinner fa-spin"></i> loading ...');
    let item = $('.droppable-area1').find('.draggable-item');
    let items = [];
    item.each(function(item, val) {
        items.push(val.getAttribute('data-id'))
    })

    let formObj = {};
    formObj.role_id = '{{ $role_id }}';
    formObj.menu_id = items;

    let self = $(this);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/role_menu',
        method: 'post',
        data: formObj,
        success: function(response) {
            self.html('Simpan');
            Swal.fire('Berhasil', response, 'success')
                .then((result) => {
                    location.reload();
                });
            console.log(response);
        },
        error: function(err) {
            console.log(err)
        }
    })

})

$('#li').addClass('active');
$('#liRoleMenu').addClass('active');
</script>
@endsection
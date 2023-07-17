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
            <div class="card connected-sortable droppable-area1">
                <div class="card-body">
                    <h5>Menu for Role</h5>
                    <p><small>Drag and drop item here</small></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 connected-sortable droppable-area2">
            <h5 class="mb-3">List Menu</h5>
            @foreach($menu as $row)
            <div class="card draggable-item">
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
$('#li').addClass('active');
$('#liRoleMenu').addClass('active');
</script>
@endsection
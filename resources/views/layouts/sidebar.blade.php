<div class="sidebar__container">
    <div class="mtContact p-1">
        <a href="{{route('contact.create')}}" class="text-decoration-none">
            <button class="create__btn d-flex justify-content-center gap-3 align-items-center px-3 border-0">
                <i class="fa fa-plus h3 mb-0 fw-bold"></i>
                <small class="mb-0">Create Contact</small>
            </button>
        </a>

        <div class="mt-3">
                <a href="{{route('contact.index')}}" class="text-decoration-none text-light w-100">
                   <div class="w-100  d-flex px-3 py-2 justify-content-between align-items-center sidebar__menu">
                       <i class="fa fa-list text-dark"></i>
                       <h6 class="mb-0 text-dark">Contact Lists</h6>
                   </div>
                </a>
        </div>
    </div>
</div>

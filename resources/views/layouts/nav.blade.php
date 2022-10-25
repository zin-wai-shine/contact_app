<div class="w-100 p-2 position-fixed d-flex justify-content-between">
    <div class="d-flex align-items-center gap-5">
       <div class="d-flex align-items-center gap-3">
           <div class="h6 mb-0 icons__hover">
               <i class="fa fa-bars text-dark"></i>
           </div>
           <div class="d-flex align-items-center gap-2">
               <div class="bg-primary rounded-circle item__photo d-flex justify-content-center align-items-center">
                   <i class="fa fa-user text-light"></i>
               </div>
               <h5 class="mb-0 text-secondary fw-light">Contacts</h5>
           </div>
       </div>

        <form action="{{route('contact.index')}}" method="get" id="searchForm">
            @csrf
        </form>

        <div class="search__container d-flex align-items-center gap-2 rounded">
            <button class="border-0" form="searchForm"><i class="fa fa-search text-secondary" style="cursor:pointer" ></i></button>
            <input value="{{request('keyword')}}" form="searchForm" type="text" name="keyword" class="search__input border-0 text-secondary">

            @if(request('keyword'))
                <a href="{{route("contact.index")}}">
                    <button class="border-0 h5 mb-0">
                        <i class="fa fa-close text-secondary" style="cursor:pointer"></i>
                    </button>
                </a>
            @endif
        </div>

    </div>

    <div>
        <div class="d-flex align-items-center gap-2">
            <div class="bg-primary rounded-circle item__photo d-flex justify-content-center align-items-center">
                <i class="fa fa-user text-light"></i>
            </div>
        </div>
    </div>
</div>

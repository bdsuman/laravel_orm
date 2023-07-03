<section class="py-5">
    <div class="container px-5 mb-5" >
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Latest Post For Each Category</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div id="project-list" class="col-lg-11 col-xl-9 col-xxl-8">
                @forelse ($categories as $category)
                    <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="p-5">
                                    <h2>{{ $category->name }}</h2>
                                    @if ($category->allLatestPost())
                                        <div>
                                            <h3>{{ $category->allLatestPost()->name }}</h3>
                                            <p>{{ $category->allLatestPost()->description }}</p>
                                        </div>
                                    @else
                                        <p>No posts found for in this category.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="p-5">
                                    <h2 class="fw-bolder"> No data Found</h2>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>





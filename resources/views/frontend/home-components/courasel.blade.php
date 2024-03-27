
    <!-- Popular news  header-->
    <div class="popular__news-header">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card__post-carousel">
                        @foreach ($heroes as $hero)
                            <div class="item">
                                <!-- Post Article -->
                                <div class="card__post">
                                    <div class="card__post__body">
                                        <a href="blog_details.html" tabindex="-1" class="image-box">
                                            <img src="{{ $hero->background }}" class="img-fluid3" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section>
        <div class="card__post__content bg-primary">
        </div>
    </section>
    <!-- End Popular news header-->
    <!-- Popular news carousel -->
    {{-- <div class="popular__news-header-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top__news__slider">
                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="#">
                                        <img src="images/newsimage5.png" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by david hall
                                            </span>,
                                        </li>

                                        <li class="list-inline-item">
                                            <span>
                                                descember 09, 2016
                                            </span>
                                        </li>
                                    </ul>
                                    <h5>
                                        <a href="#">
                                            Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="#">
                                        <img src="images/newsimage6.png" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by david hall
                                            </span>,
                                        </li>

                                        <li class="list-inline-item">
                                            <span>
                                                descember 09, 2016
                                            </span>
                                        </li>
                                    </ul>
                                    <h5>
                                        <a href="#">
                                            Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="#">
                                        <img src="images/newsimage7.png" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by david hall
                                            </span>,
                                        </li>

                                        <li class="list-inline-item">
                                            <span>
                                                descember 09, 2016
                                            </span>
                                        </li>
                                    </ul>
                                    <h5>
                                        <a href="#">
                                            Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="#">
                                        <img src="images/newsimage8.png" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by david hall
                                            </span>,
                                        </li>

                                        <li class="list-inline-item">
                                            <span>
                                                descember 09, 2016
                                            </span>
                                        </li>
                                    </ul>
                                    <h5>
                                        <a href="#">
                                            Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="#">
                                        <img src="images/newsimage8.png" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by david hall
                                            </span>,
                                        </li>

                                        <li class="list-inline-item">
                                            <span>
                                                descember 09, 2016
                                            </span>
                                        </li>
                                    </ul>
                                    <h5>
                                        <a href="#">
                                            Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Popular news carousel -->


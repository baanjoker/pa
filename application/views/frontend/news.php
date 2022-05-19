<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 well">
                    <div class="post">
                        <div class="col-md-12 body_context">                            
                            <div class="col-md-6 col-xs-6">
                            </div>   
                            <div class="cont">
                                <div class="container_news">
                                    <?php foreach ($news_d as $key): ?>
                                    <div class="single-item">
                                        <div class="content-box">
                                            <div class="date-box">
                                                <div class="inner">
                                                    <div class="date"><b><?= date('d',strtotime($key->advisory_date)) ?></b> <?= date('M',strtotime($key->advisory_date)) ?>  <?= date('Y',strtotime($key->advisory_date)) ?></div>                                       
                                                </div>
                                            </div>                                
                                        </div>
                                        <h3><?= $key->advisory_title ?></h3>
                                        <p><?= character_limiter($key->advisory_details,100) ?><a href="<?= base_url("news/details/".$key->id_advisory."/".url_title($key->advisory_title)) ?>"><i class="fa fa-chevron-circle-right"></i>
                               Continue reading</a></p>
                                        
                                    </div> 
                                    <?php endforeach ?>   
                                    <!-- <div class="single-item">2</div>
                                    <div class="single-item">3</div>
                                    <div class="single-item">4</div>
                                    <div class="single-item">5</div>
                                    <div class="single-item">6</div>
                                    <div class="single-item">7</div>
                                    <div class="single-item">8</div>
                                    <div class="single-item">9</div>
                                    <div class="single-item">10</div>
                                    <div class="single-item">11</div>
                                    <div class="single-item">12</div>
                                    <div class="single-item">13</div>
                                    <div class="single-item">14</div>
                                    <div class="single-item">15</div>
                                    <div class="single-item">16</div>
                                    <div class="single-item">17</div>
                                    <div class="single-item">18</div>
                                    <div class="single-item">19</div>
                                    <div class="single-item">20</div>
                                    <div class="single-item">21</div>
                                    <div class="single-item">22</div>
                                    <div class="single-item">23</div> -->
                                </div>
                            </div>                        
                        </div>                                               
                    </div>
                </div>                                 
            </div>
        </div>        
    </div>

<script type="text/javascript">
    (function($) {
    var pagify = {
        items: {},
        container_news: null,
        totalPages: 1,
        perPage: 3,
        currentPage: 0,
        createNavigation: function() {
            this.totalPages = Math.ceil(this.items.length / this.perPage);

            $('.pagination', this.container_news.parent()).remove();
            var pagination = $('<div class="pagination"></div>').append('<a class="nav prev disabled" data-next="false"><</a>');

            for (var i = 0; i < this.totalPages; i++) {
                var pageElClass = "page";
                if (!i)
                    pageElClass = "page current";
                var pageEl = '<a class="' + pageElClass + '" data-page="' + (
                i + 1) + '">' + (
                i + 1) + "</a>";
                pagination.append(pageEl);
            }
            pagination.append('<a class="nav next" data-next="true">></a>');

            this.container_news.after(pagination);

            var that = this;
            $("body").off("click", ".nav");
            this.navigator = $("body").on("click", ".nav", function() {
                var el = $(this);
                that.navigate(el.data("next"));
            });

            $("body").off("click", ".page");
            this.pageNavigator = $("body").on("click", ".page", function() {
                var el = $(this);
                that.goToPage(el.data("page"));
            });
        },
        navigate: function(next) {
            // default perPage to 5
            if (isNaN(next) || next === undefined) {
                next = true;
            }
            $(".pagination .nav").removeClass("disabled");
            if (next) {
                this.currentPage++;
                if (this.currentPage > (this.totalPages - 1))
                    this.currentPage = (this.totalPages - 1);
                if (this.currentPage == (this.totalPages - 1))
                    $(".pagination .nav.next").addClass("disabled");
                }
            else {
                this.currentPage--;
                if (this.currentPage < 0)
                    this.currentPage = 0;
                if (this.currentPage == 0)
                    $(".pagination .nav.prev").addClass("disabled");
                }

            this.showItems();
        },
        updateNavigation: function() {

            var pages = $(".pagination .page");
            pages.removeClass("current");
            $('.pagination .page[data-page="' + (
            this.currentPage + 1) + '"]').addClass("current");
        },
        goToPage: function(page) {

            this.currentPage = page - 1;

            $(".pagination .nav").removeClass("disabled");
            if (this.currentPage == (this.totalPages - 1))
                $(".pagination .nav.next").addClass("disabled");

            if (this.currentPage == 0)
                $(".pagination .nav.prev").addClass("disabled");
            this.showItems();
        },
        showItems: function() {
            this.items.hide();
            var base = this.perPage * this.currentPage;
            this.items.slice(base, base + this.perPage).show();

            this.updateNavigation();
        },
        init: function(container_news, items, perPage) {
            this.container_news = container_news;
            this.currentPage = 0;
            this.totalPages = 1;
            this.perPage = perPage;
            this.items = items;
            this.createNavigation();
            this.showItems();
        }
    };

    // stuff it all into a jQuery method!
    $.fn.pagify = function(perPage, itemSelector) {
        var el = $(this);
        var items = $(itemSelector, el);

        // default perPage to 5
        if (isNaN(perPage) || perPage === undefined) {
            perPage = 3;
        }

        // don't fire if fewer items than perPage
        if (items.length <= perPage) {
            return true;
        }

        pagify.init(el, items, perPage);
    };
})(jQuery);

$(".container_news").pagify(3, ".single-item");

</script>
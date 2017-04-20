<div class="row">

    @foreach($posts as $post)    
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><a href="#">{{ $post->post_title }}</a></h4>

                </div>

                <div class="panel-body">
                    <img src="http://placehold.it/320x150" alt="">

                    <div class="caption">
                        <h4>Rp. <span class="rupiah">{{ $post->price_start }}</span> - <span class="rupiah">{{ $post->price_end }}</span> </h4>   
                    </div>

                    <span>{{ $post->user->display_name }} </span>
                </div>

                <div class="panel-footer">
                    <div class="ratings">
                        <p class="pull-right">15 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
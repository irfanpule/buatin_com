<div class="row">

    @foreach($posts as $post)    
        <div class="col-sm-4 col-lg-3 col-md-3">
            <div class="panel panel-default">

                @foreach($post->post_metas->where('meta_key', 'default_image') as $meta)
                    @php $img = $meta->meta_value @endphp
                @endforeach
                <div class="img-thumb" style="background-image:url('{{ asset($img) }}');">
                </div>

                
                <div class="panel-heading" style="height:80px;">
                    <h4><a href="{{ route('singlePost', ['id' => $post->id, 'slug' => str_slug($post->post_title)]) }}">{{ title_case($post->post_title) }}</a></h4>
                </div>

                <div class="panel-body">
                    <div class="meta-title">
                        @foreach($post->post_metas->where('meta_key', 'post_category') as $meta)
                            {{ $meta->meta_value }}
                        @endforeach
                        
                        @foreach($post->user->umetas->where('meta_key', 'kab-kota') as $umeta) 
                           <i class="fa fa-map-marker"></i> {{ title_case($umeta->kab_kota->nama) }}-{{ title_case($umeta->kab_kota->provinsi->nama) }}
                        @endforeach
                    </div>

                    <div class="price">
                        <h5>Rp. <span class="rupiah">{{ $post->price_start }}</span> - <span class="rupiah">{{ $post->price_end }}</span> </h5>   
                    </div>

                    <span class="meta-title">
                        <img src="{{ asset($post->user->avatar)}}" class="img-circle avatar-25">
                        {{ $post->user->display_name }} 
                    </span>

                    
                    
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
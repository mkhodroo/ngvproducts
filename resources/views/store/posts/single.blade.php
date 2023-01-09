
<div class="col-md-12 col-sm-12 sigle-post">
    <div class="sigle-post-content" style="background: #f2fcfc ; border-radius: 8px">
        <div class="thumbnail no-border no-padding">
            <div class="media" style="padding: 5px">
                <a class="media-link" data-gal="prettyPhoto" href="{{ $item->image() }}">
                    <img src='{{ $item->image() ?? '' }}' alt=""/>
                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                </a>
            </div>
            <div class="caption text-center">
                <h4 class="caption-title"><a href="{{ $item->guid ?? '' }}" target="_blank">{{ $item->post_title ?? '' }}</a></h4>
                <p>
                    {{ Str::limit($item->post_excerpt, 150, "...") }}
                </p>
                <div class="rating">
                    <span class="star"></span><!--
                    --><span class="star active"></span><!--
                    --><span class="star active"></span><!--
                    --><span class="star active"></span><!--
                    --><span class="star active"></span>
                </div>
            </div>
        </div>
    </div>
    
</div>
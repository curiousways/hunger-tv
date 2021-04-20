<a href="http://www.facebook.com/sharer.php?u={{ get_permalink() }}&t={{get_the_title()}}" target="_blank">
<img src="{{ $social_new->facebook_share_icon['url'] }}" alt="{{ $social_new->facebook_share_icon['alt'] }}" />
</a>
<a href="https://twitter.com/intent/tweet?text={{get_the_title()}}&url={{ get_permalink() }}&via=hungermagazine" target="_blank">
<img src="{{ $social_new->twitter_share_icon['url'] }}" alt="{{ $social_new->twitter_share_icon['alt'] }}" />
</a>
<a href="http://pinterest.com/pin/create/button/?url={{ get_permalink() }}&amp;media={{ $social_new->thumbnail }}&amp;description={{get_the_title()}}" target="_blank">
<img src="{{ $social_new->pinterest_share_icon['url'] }}" alt="{{ $social_new->pinterest_share_icon['alt'] }}" />
</a>
<a href="mailto://?subject={{get_the_title()}}&body={{ get_permalink() }}">
<img src="{{ $social_new->email_share_icon['url'] }}" alt="{{ $social_new->email_share_icon['alt'] }}" />
</a>
<input type="hidden" id="input-url" value="Copied!">
<a href="#" class="btn-copy">
<img src="{{ $social_new->link_share_icon['url'] }}" alt="{{ $social_new->link_share_icon['alt'] }}" />
</a>

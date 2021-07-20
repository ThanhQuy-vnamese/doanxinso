
    @php( $blog = \App\tabblog::limit(2)->latest()->get() ) 
    <footer class="ftco-footer ftco-section img">
      <div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Về chúng tôi</h2>
              <img src="../public/images/Logo.jpg" width="150px" height="150px">
              <p>Đến với Nhà hàng 1998 coffee, Quý khách sẽ được thưởng thức món ăn ngon, mới lạ đa dạng, mang hương sắc phương tây, cùng đội ngũ đầu bếp nhiều năm kinh nghiệm.
                Hãy đến với nhà hàng 1998 coffee để tận hưởng không gian thoải mái và thưởng thức những món ăn ngon tinh tế cùng gia đình và bạn bè.
                Sự hài lòng của Quý khách là niềm tự hào của Nhà Hàng chúng tôi.
                </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Fanpage</h2>
              <div class="block-21 mb-4 d-flex">
                <div class="fb-page" data-href="https://www.facebook.com/only1998Coffee/" data-tabs="message" data-width="280px" data-height="150px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/only1998Coffee/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/only1998Coffee/">1998 Coffee</a></blockquote></div>
              </div>
            </div>
            <div class="fb-share-button" data-href="{{$url_canonical}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
            <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Dịch vụ</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Karaoke</a></li>
                <li><a href="#" class="py-2 d-block">Xe đưa rước</a></li>
                <li><a href="#" class="py-2 d-block">Giao hàng tận nơi</a></li>
                <li><a href="#" class="py-2 d-block">Đặt tiệc theo yêu cầu</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Thông tin liên hệ</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">12 Nguyễn Văn Bảo, Phường 4, Gò vấp, thành phố Hồ Chí Minh</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            
          </div>
        </div>
      </div>
    </footer>

    
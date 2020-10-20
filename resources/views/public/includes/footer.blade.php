<footer>
    <div class="container">
      <div class="row">
        <div class="span3"></div>
        <div class="span3">
          <div class="widget">
            <h5 class="widgetheading">Browse pages</h5>
            <ul class="link-list">
              <li><a href="{{route('home')}}">Home</a></li>
              <li><a href="{{route('about')}}">About</a></li>
              <li><a href="{{route('gallery')}}">Gallery</a></li>
              <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
          </div>
        </div>
        {{-- <div class="span3">
          <div class="widget">
            <h5 class="widgetheading">Important stuff</h5>
            <ul class="link-list">
              <li><a href="#">Press release</a></li>
              <li><a href="#">Terms and conditions</a></li>
              <li><a href="#">Privacy policy</a></li>
              <li><a href="#">Career center</a></li>
              <li><a href="#">Flattern forum</a></li>
            </ul>
          </div>
        </div> --}}
        {{-- <div class="span3">
          <div class="widget">
            <h5 class="widgetheading">Flickr photostream</h5>
            <div class="flickr_badge">
              <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=34178660@N03"></script>
            </div>
            <div class="clear">
            </div>
          </div>
        </div> --}}
@php
  $museum = DB::table('museums')->orderBy('id', 'desc')->first();  //update         
@endphp
        <div class="span3">
          <div class="widget">
            <h5 class="widgetheading">Get in touch with us</h5>
            <address>
                <strong>{{$museum->museum_name}}</strong><br>
                {{$museum->address}}<br>
                  
            </address>
            <p>
              <i class="icon-phone"></i> (+88) {{$museum->phone}} <br>
              <i class="icon-envelope-alt"></i> museum@gmail.com
            </p>
          </div>
        </div>
        <div class="span3"></div>
      </div>
    </div>
    <div id="sub-footer">
      <div class="container">
        <div class="row">
          <div class="span6">
            <div class="copyright">
              <p>
                <span>&copy; Flattern - All right reserved.</span>
              </p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flattern
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
          <div class="span6">
            <ul class="social-network">
              <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square"></i></a></li>
              <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square"></i></a></li>
              <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square"></i></a></li>
              <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square"></i></a></li>
              <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
<!-- Special Items Page -->

<div id="special" class="tm-page-content">
    <div class="tm-special-items">
      @foreach($specialitems as $specialitem)
      <div class="tm-black-bg tm-special-item">
        <img style="width:320px"  src="{{asset('assets/images/'.$specialitem->img)}}" alt="Image">
        <div class="tm-special-item-description">
          <h2 class="tm-text-primary tm-special-item-title">{{$specialitem->title}}</h2>
          <p class="tm-special-item-text">{{$specialitem->content}}.</p>  
        </div>
      </div>
      @endforeach
      {{-- <div class="tm-black-bg tm-special-item">
        <img src="{{asset('assets/img/special-02.jpg')}}" alt="Image">
        <div class="tm-special-item-description">
          <h2 class="tm-text-primary tm-special-item-title">Second Item</h2>
          <p class="tm-special-item-text">You are allowed to download, modify and use this template for your commercial or non-commercial websites.</p>  
        </div>
      </div>
      <div class="tm-black-bg tm-special-item">
        <img src="{{asset('assets/img/special-03.jpg')}}" alt="Image">
        <div class="tm-special-item-description">
          <h2 class="tm-text-primary tm-special-item-title">Third Special Item</h2>
          <p class="tm-special-item-text">Pellentesque in ultrices mi, quis mollis nulla. Quisque sed commodo est, quis tincidunt nunc.</p>  
        </div>
      </div>
      <div class="tm-black-bg tm-special-item">
        <img src="{{asset('assets/img/special-04.jpg')}}" alt="Image">
        <div class="tm-special-item-description">
          <h2 class="tm-text-primary tm-special-item-title">Special Item Fourth</h2>
          <p class="tm-special-item-text">Vivamus finibus nulla sed metus sagittis, sed ultrices magna aliquam. Mauris fermentum.</p>  
        </div>
      </div>      
      <div class="tm-black-bg tm-special-item">
        <img src="{{asset('assets/img/special-05.jpg')}}" alt="Image">
        <div class="tm-special-item-description">
          <h2 class="tm-text-primary tm-special-item-title">Sixth Sense</h2>
          <p class="tm-special-item-text">Here is a short text description for sixth item. This text is four lines.</p>  
        </div>
      </div>
      <div class="tm-black-bg tm-special-item">
        <img src="{{asset('assets/img/special-06.jpg')}}" alt="Image">
        <div class="tm-special-item-description">
          <h2 class="tm-text-primary tm-special-item-title">Seventh Item</h2>
          <p class="tm-special-item-text">Curabitur eget erat sit amet sapien aliquet vulputate quis sed arcu.</p>  
        </div>
      </div>                       --}}
    </div>            
  </div>
  
  <!-- end Special Items Page -->
<div class="tm-right">
    <main class="tm-main">
      <div id="drink" class="tm-page-content">
        <!-- Drink Menu Page -->
        <nav class="tm-black-bg tm-drinks-nav">
          <ul>
            @if(isset($categories) && count($categories) > 0)
            @foreach($categories as $category)
            <li>
              <a href="#{{$category->id}}" class="tm-tab-link active" data-id="{{$category->id}}">{{$category->category}}</a>
            </li>
            @endforeach
            @else
            <li>No Categories Found</li>
            @endif
            {{-- <li>
              <a href="#" class="tm-tab-link" data-id="hot">Hot Coffee</a>
            </li>
            <li>
              <a href="#" class="tm-tab-link" data-id="juice">Fruit Juice</a>
            </li> --}}
          </ul>
        </nav>

        {{-- <div id="cold" class="tm-tab-content"> --}}
          @if(isset($categories) && count($categories) > 0)
          @foreach($categories as $category)
        <div id="{{$category->id}}" class="tm-tab-content">
          <div class="tm-list">
            @foreach($category->beverages as $beverage)
            <div class="tm-list-item">          
              <img src="{{asset('assets/images/'.$beverage->img)}}" alt="Image" class="tm-list-item-img">
              <div class="tm-black-bg tm-list-item-text">
                <h3 class="tm-list-item-name">{{$beverage->title}}<span class="tm-list-item-price">{{$beverage->price}}$</span></h3>
                <p class="tm-list-item-description">{{$beverage->content}}</p>
              </div>
            </div>
            @endforeach
          
          </div>
        </div>
        @endforeach
        @endif
        <!-- end Drink Menu Page -->
      </div>
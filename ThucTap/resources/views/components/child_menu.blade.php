@if($categoryParent->children->count())
    <ul role="menu" class="sub-menu">
        @foreach($categoryParent->children as $categoryChild)
            <li><a href="{{route('category.product',['slug' => $categoryChild->slug,'id' => $categoryChild->id])}}">{{$categoryChild->name}}</a></li>
            @if($categoryChild->children->count())
                @include('components.child_menu',['categoryParent' => $categoryChild])
            @endif
        @endforeach
    </ul>
@endif

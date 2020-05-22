<ul>
    @foreach($category as $cate)
            <li>{{ $cate->name }}
                @if(count( $cate->subcategory) > 0 )
                    <ul>
                    @foreach($categ->subcategory as $subcategory)
                        <li>{{ $subcategory->name }}</li>
                    @endforeach 
                    </ul>
                @endif
            </li>                   
    @endforeach
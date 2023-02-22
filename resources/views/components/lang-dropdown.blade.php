<li class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle " href="" data-toggle="dropdown" aria-expanded="true">
        {{$active_lang}}
    </a>
    <ul class="dropdown-menu border-0 shadow " style="left: 0px; right: inherit;">
        @for ($i = 0; $i <count($active_langs); $i++)
            <li>
                <a class="dropdown-item cursor-pointer flex flex-row items-center"
                   href="{{$active_langs[$i]["url"]}}">
                    <img width="30" height="25" src="{{asset($active_langs[$i]["src"])}}" alt="flag"
                         class="mr-2 rounded-sm">
                    <span>{{$active_langs[$i]["name"]}}</span>
                </a>
            </li>
        @endfor
    </ul>
</li>

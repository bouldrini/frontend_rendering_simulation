<div class="col-sm-3">
    <article class='thumbnail' id='{!! $id !!}'>
        <div class='box-offset'>
            <div id="carousel-<?php echo $id; ?>" class="carousel slide carousel-fade">

                <!-- Thumbnails -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    if(sizeof($inserat["imgs"]) >= 1){
                        $i = 1;
                    } else {
                        $i = 0;
                    }
                    ?>
                    @foreach($inserat["imgs"] as $thumbnail)
                        <div id="{!! $i !!}" class="carousel-item {!! $i == 1 ? "active" : "" !!}" style="">
                            <img src="{!! $thumbnail !!}"/>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
    <div class="details">
        <b>title:</b> {{ $dummydata["title"] }}<br/>
        <b>longitude:</b> {{ $dummydata["longitude"] }}<br/>
        <b>latitude:</b> {{ $dummydata["latitude"] }}<br/>
        <b>price_per_month:</b> {{ $dummydata["price_per_month"] }}<br/>
        <b>monthly_fee:</b> {{ $dummydata["monthly_fee"] }}<br/>
        <b>caution:</b> {{ $dummydata["caution"] }}<br/>
        <b>city:</b> {{ $dummydata["city"] }}<br/>
        <b>zip_code:</b> {{ $dummydata["zip_code"] }}<br/>
        <b>description:</b> {{ $dummydata["description"] }}<br/>
    </div>
</div>

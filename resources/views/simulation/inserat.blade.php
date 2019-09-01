<section class="search_result_container bigger">
    <div class=" estate_24488588 search_result_entry" itemscope="" itemprop="offers" itemtype="https://schema.org/Room https://schema.org/Offer">
        <div class="search_result_entry-thumbnail">
            <a itemprop="url" rel="">
                <img src="{{ $inserat["imgs"][rand(0,9)] }}" alt="WG Erfurt - Brühlervorstadt" width="280" height="210">
            </a>
        </div>
        <div class="search_result_entry-data">
            <div>
                <div class="search_result_entry-headline">
                    <a rel="" title="{{ $dummydata["description"] }}" class="nounderline">
                        <h3 class="normalized-h3">
                            {{ $dummydata["title"] }}
                        </h3>
                    </a>
                </div>
                <div class="search_result_entry-subheadline">
                    {{ $dummydata["zip_code"] }} - {{ $dummydata["city"] }}
                </div>
            </div>
            <div class="search_result_entry-objectproperties">
                <dl class="search_result_entry-objectproperty" style="padding-right:5px;">
                    <dt>
                        KALTMIETE
                    </dt>
                    <dd class="green">
                        {{ $dummydata["price_per_month"] }}&nbsp;€
                    </dd>
                </dl>
                <dl class="search_result_entry-objectproperty">
                    <dt>
                        KAUTION
                    </dt>
                    <dd>
                        {{ $dummydata["caution"] }}&nbsp;€
                    </dd>
                </dl>
                <dl class="search_result_entry-objectproperty">
                    <dt>
                        FLÄCHE
                    </dt>
                    <dd>
                        18&nbsp;m²
                    </dd>
                </dl>
            </div>
            <div itemscope="" itemprop="priceSpecification" itemtype="https://schema.org/PriceSpecification">
                <meta itemprop="price" content="{{ $dummydata["price_per_month"] }}">
                <meta itemprop="priceCurrency" content="EUR">
            </div>
            <div itemscope="" itemprop="geo" itemtype="https://schema.org/GeoCoordinates">
                <meta itemprop="latitude" content="{{ $dummydata['latitude'] }}">
                <meta itemprop="longitude" content="{{ $dummydata['longitude'] }}">
            </div>
            <div itemscope="" itemprop="address" itemtype="https://schema.org/PostalAddress">
                <meta itemprop="addressCountry" content="DE">
                <meta itemprop="addressLocality" content="{{ $dummydata["city"] }}">
            </div>
            <div itemscope="" itemprop="floorSize" itemtype="https://schema.org/QuantitativeValue">
                <meta itemprop="value" content="18">
                <meta itemprop="unitCode" content="MTK">
            </div>
            <div itemscope="" itemprop="numberOfRooms" itemtype="https://schema.org/QuantitativeValue">
                <meta itemprop="value" content="1">
                <meta itemprop="unitCode" content="ROM">
            </div>
            <div class="search_result_entry-furnishings">
                <ul class="green-checkmark-ul inline">
                    <li>
                        möbliert
                    </li>
                    <li>
                        Einbauküche
                    </li>
                </ul>
            </div>
        </div>
        <div class="search_result_entry-actions">
            <div class="home-button">
                <a class="button" rel="">
                    Details
                </a>
            </div>
        </div>
    </div>
</section>
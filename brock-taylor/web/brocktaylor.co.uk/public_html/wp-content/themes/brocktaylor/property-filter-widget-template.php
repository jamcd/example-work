<div id="property-filter" class="property-filter widget-property-filter">
    <form method="get" action="/search-for-properties" class="widget-property-filter-form">
        <div class="property-filter-group filter-price">
            <div class="label-container">
                <label>Price Range</label>
                <div id="property-filter-price-indicator" class="indicator-label"><span class="min"></span> - <span class="max"></span></div>
            </div>
            <div class="filter-slider">
                <input type="hidden" name="price-min" id="property-filter-price-min" value="<?php echo $this->input('price-min', 100000) ?>">
                <input type="hidden" name="price-max" id="property-filter-price-max" value="<?php echo $this->input('price-max', 500000) ?>">
                <div id="property-filter-price-slider"></div>
            </div>
        </div>

        <div class="property-filter-group filter-bedrooms">
            <div class="label-container">
                <label>Bedrooms</label>
                <div id="property-filter-bedrooms-indicator" class="indicator-label">min <span></span> bedrooms</div>
            </div>
            <div class="filter-slider">
                <input type="hidden" name="beds" id="property-filter-bedrooms" value="<?php echo $this->input('beds', 3) ?>">
                <div id="property-filter-bedrooms-slider"></div>
            </div>
        </div>

        <div class="property-filter-group filter-location">
            <div class="label-container">
                <label>Location</label><br>
            </div>
            <div class="filter-input">
                <input type="text" name="location" id="property-filter-location" value="<?php echo $this->input('location', 'Horsham, West Sussex') ?>">
            </div>
        </div>

        <div class="property-filter-group filter-distance">
            <div class="label-container">
                <label>Distance</label>
                <div id="property-filter-distance-indicator" class="indicator-label">within <span></span> miles</div>
            </div>
            <div class="filter-slider">
                <input type="hidden" name="distance" id="property-filter-distance" value="<?php echo $this->input('distance', 10) ?>">
                <div id="property-filter-distance-slider"></div>
            </div>
        </div>

        <div class="property-filter-group filter-sort">
            <div class="label-container">
                <label>Sort By</label>
            </div>
            <div class="filter-input">
                <select name="sort">
                    <option value="distance" <?php echo $this->input('sort') == 'distance' ? 'selected="selected"' : '' ?>>Distance</option>
                    <option value="price" <?php echo $this->input('sort') == 'price' ? 'selected="selected"' : '' ?>>Price</option>
                </select>
                <select name="sortdir">
                    <option value="asc" <?php echo $this->input('sortdir') == 'asc' ? 'selected="selected"' : '' ?>>Ascending</option>
                    <option value="desc" <?php echo $this->input('sortdir') == 'desc' ? 'selected="selected"' : '' ?>>Descending</option>
                </select>
            </div>
        </div>

        <div class="property-filter-submit-group">
            <button type="submit" id="property-filter-submit">Search</button>
        </div>
    </form>
</div>
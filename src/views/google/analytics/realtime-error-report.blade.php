<h1>{{ $categoryType }}</h1>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="code-tab" data-toggle="tab" href="#code" role="tab" aria-controls="code"
           aria-selected="false">Alert Code</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="city-tab" data-toggle="tab" href="#city" role="tab" aria-controls="city"
           aria-selected="false">City</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
           aria-selected="false">Form</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user"
           aria-selected="true">User</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade" id="city" role="tabpanel" aria-labelledby="city-tab">
      <?php $groupedCollection = $collection->groupByCity(); ?>
        @include('admin::google.analytics.grouped-collection-report')
    </div>
    <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
      <?php $groupedCollection = $collection->groupByUser(); ?>
        @include('admin::google.analytics.grouped-collection-report')
    </div>
    <div class="tab-pane fade" id="code" role="tabpanel" aria-labelledby="code-tab">
      <?php $groupedCollection = $collection->groupByCode(); ?>
        @include('admin::google.analytics.grouped-collection-report')
    </div>
    <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
      <?php $groupedCollection = $collection->groupByForm(); ?>
        @include('admin::google.analytics.grouped-collection-report')
    </div>
</div>
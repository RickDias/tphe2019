<script>
var chartIdJS = {$chartIdJS};
var kpiIdJS = {$kpiIdJS};
</script>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header header-sm align-items-center">
            <div class="d-flex align-items-center">
                <h4>{$title}</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex row">
                {foreach from=$graphs item=graph}
                    {$graph}
                {/foreach}
            </div>
        </div>
    </div>
</div>

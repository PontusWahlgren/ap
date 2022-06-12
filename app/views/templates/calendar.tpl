<!doctype html>
<html lang="en">
    <head>
        <title>Calendar</title>
        {include file="{$tpl_dir}includes/head.html"}
        <link href="css/calendar.css" rel="stylesheet" type="text/css"/>
        <script src="js/calendar.js" type="text/javascript" async></script>
    </head>
    <body>﻿
        {include file="{$tpl_dir}includes/header.tpl"}
            <div id="calendar" class="container">
                <div class="calendar-menu row">
                    <div class="col-2">
                        <p class="text-right"><a href="calendar.php">Today</a></p>
                    </div>
                    <div class="col-8">
                        <ul>
                            <li class="list-inline-item">
                                <a href="?ym={$prev}" class="btn btn-link">&lt; prev</a>
                            </li>
                            <li class="list-inline-item">
                                <span class="title">{$title}</span>
                            </li>
                            <li class="list-inline-item">
                                <a href="?ym={$next}" class="btn btn-link">next &gt;</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEvent">
                            Add event
                        </button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thi</th>
                            <th>Fri</th>
                            <th>Sat</th>
                            <th>Sun</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        {foreach $weeks as $week}
                            {$week}
                        {/foreach}
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addEvent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <fieldset id="selectProductFieldset" class="select-product">
                                    <div class="product-select mb-3">
                                        <label for="productSelect" class="form-label">Product</label>
                                        <select id="productSelect" class="form-select">
                                            <option>---</option>
                                            <option>Product 1</option>
                                        </select>
                                    </div>
                                    <div class="price-input mb-3">
                                        <label for="priceInput" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="priceInput">
                                    </div>
                                </fieldset>
                                <fieldset id="newProductFieldset" class="add-new-product" style="display:none;">
                                    <div class="new-product-name mb-3">
                                        <label for="newProductNameInput" class="form-label">Name</label>
                                        <input type="input" class="form-control" id="newProductNameInput">
                                    </div>
                                    <div class="add-new-product-artnr mb-3">
                                        <label for="newProductArtnrInput" class="form-label">Article Number</label>
                                        <input type="input" class="form-control" id="newProductArtnrInput">
                                    </div>
                                    <div class="new-product-weight mb-3">
                                        <label for="newProductWeightInput" class="form-label">Weight</label>
                                        <input type="input" class="form-control" id="newProductWeightInput">
                                    </div>
                                    <div class="new-product-price mb-3">
                                        <label for="newProductPriceInput" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="newProductPriceInput">
                                    </div>
                                </fieldset>
                                <div class="mb-3 add-product-check">
                                    <input type="checkbox" class="form-check-input" id="addNewProductCheck">
                                    <label id="addNewProductCheckLabel" class="form-check-label" for="addNewProductCheck">
                                        <span id="addNewProductCheckLabelText">Missing a product? Add a new one here!</span>
                                        <span id="useExistingProductCheckLabelText" style="display:none;">Use existing product? Uncheck box.</span>
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-start" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success float-end">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        {include file="{$tpl_dir}includes/footer.tpl"}
    </body>
</html>
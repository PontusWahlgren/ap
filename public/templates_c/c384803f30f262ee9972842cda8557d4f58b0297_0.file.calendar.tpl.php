<?php
/* Smarty version 4.1.0, created on 2022-06-12 16:58:10
  from 'C:\xampp\htdocs\ap\app\views\templates\calendar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62a5ff02af16b5_75640338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c384803f30f262ee9972842cda8557d4f58b0297' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ap\\app\\views\\templates\\calendar.tpl',
      1 => 1655045888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a5ff02af16b5_75640338 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
    <head>
        <title>Calendar</title>
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."includes/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </head>
    <body>﻿
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."includes/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <div id="calendar" class="container">
                <div class="calendar-menu row">
                    <div class="col-2">
                        <p class="text-right"><a href="calendar.php">Today</a></p>
                    </div>
                    <div class="col-8">
                        <ul>
                            <li class="list-inline-item">
                                <a href="?ym=<?php echo $_smarty_tpl->tpl_vars['prev']->value;?>
" class="btn btn-link">&lt; prev</a>
                            </li>
                            <li class="list-inline-item">
                                <span class="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
                            </li>
                            <li class="list-inline-item">
                                <a href="?ym=<?php echo $_smarty_tpl->tpl_vars['next']->value;?>
" class="btn btn-link">next &gt;</a>
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
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['weeks']->value, 'week');
$_smarty_tpl->tpl_vars['week']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['week']->value) {
$_smarty_tpl->tpl_vars['week']->do_else = false;
?>
                            <?php echo $_smarty_tpl->tpl_vars['week']->value;?>

                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."includes/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </body>
</html><?php }
}

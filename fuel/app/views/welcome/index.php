<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Multisafepay Test</title>
        <?php echo Asset::css(Array('bootstrap.css', 'multisafepay.css')); ?>
        <?php echo Asset::js(Array('jquery.js', 'bootstrap.js')); ?>
    </head>
    <body>
        <!-- HEADER -->
        <header class="bg-primary">
            <h3 class="text-center">Welcome at Multisafe Test</h3>
        </header>
        
        <!-- BODY -->
        <div class="container">

            <!-- SEARCH -->
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php echo Form::open(array('action' => '', 'method' => 'get', 'class' => 'form-horizontal')); ?>  
                        <div class="form-group form-group-lg">
                            <?php echo Form::label('Transaction id:', 'transactionId', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-6">
                                <?php echo Form::input('transactionId', null, array('class' => 'form-control')); ?> 
                            </div>
                            <?php echo Form::button('','Search', array('class' => 'col-sm-3 btn btn-default')); ?> 
                        </div>
                    <?php echo Form::close(); ?> 
                </div>
            </div>

            <?php if(isset($error)) { ?>
                <!-- ERROR -->
                <div class="alert alert-danger" role="alert">
                    <p><strong>Code:</strong> <?php echo $error['code'] ?></p>
                    <p><strong>Description:</strong> <?php echo $error['description'] ?></p>
                </div>
            <?php } else if (isset($ewallet) || isset($transaction) || isset($payment) || 
                             isset($customer) || isset($customer) || isset($cart)) { ?>
                <!-- MENU -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#ewallet" aria-controls="ewallet" role="tab" data-toggle="tab">
                            <span class="glyphicon glyphicon-credit-card"></span> Ewallet
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#transaction" aria-controls="transaction" role="tab" data-toggle="tab">
                            <span class="glyphicon glyphicon-info-sign"></span> Transaction info
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#payment" aria-controls="payment" role="tab" data-toggle="tab">
                            <span class="glyphicon glyphicon-usd"></span> Payment details
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#customer" aria-controls="customer" role="tab" data-toggle="tab">
                            <span class="glyphicon glyphicon-folder-close"></span> Customer info
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#cart" aria-controls="cart" role="tab" data-toggle="tab">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Shopping cart
                        </a>
                    </li>
                </ul>
                
                <!-- CONTENT --> 
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="ewallet">
                        <div class="panel panel-info">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">Ewallet information: </h3> 
                            </div> 
                            <div class="panel-body"> 
                                <div class="row">
                                    <div class="col-md-6"> 
                                        <?php if (isset($ewallet['id'])) { ?> 
                                            <p><strong>Id:</strong> <?php echo $ewallet['id'] ?></p>
                                        <?php } ?>
                                        <?php if (isset($ewallet['status'])) { ?> 
                                            <p><strong>Status:</strong> <?php echo $ewallet['status'] ?></p>
                                        <?php } ?>
                                        <?php if (isset($ewallet['financialstatus'])) { ?> 
                                            <p><strong>Financial status:</strong> <?php echo $ewallet['financialstatus'] ?></p>
                                        <?php } ?>
                                        <?php if (isset($ewallet['fastcheckout'])) { ?> 
                                            <p><strong>Fast checkout:</strong> <?php echo $ewallet['fastcheckout'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6"> 
                                        <?php if (isset($ewallet['created'])) { ?> 
                                            <p><strong>Created:</strong> <?php echo $ewallet['created'] ?></p>
                                        <?php } ?>
                                        <?php if (isset($ewallet['modified'])) { ?> 
                                            <p><strong>Modified:</strong> <?php echo $ewallet['modified'] ?></p>
                                        <?php } ?>
                                        <?php if (isset($ewallet['reason'])) { ?> 
                                            <p><strong>Reason:</strong> <?php echo $ewallet['reason'] ?></p>
                                        <?php } ?>
                                        <?php if (isset($ewallet['reasoncode'])) { ?> 
                                            <p><strong>Reason code:</strong> <?php echo $ewallet['reasoncode'] ?></p>
                                        <?php } ?>
                                    </div>   
                                </div>
                            </div> 
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="transaction">
                        <div class="panel panel-info">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">Transaction information: </h3> 
                            </div> 
                            <div class="panel-body"> 
                                <?php if (isset($transaction['id'])) { ?> 
                                    <p><strong>Id:</strong> <?php echo $transaction['id'] ?></p>
                                <?php } ?>
                                <?php if (isset($transaction['description'])) { ?>     
                                    <p><strong>Description:</strong> <?php echo $transaction['description'] ?></p>
                                <?php } ?>
                                <?php if (isset($transaction['amount']) && isset($transaction['currency'])) { ?>     
                                    <p><strong>Amount:</strong> <?php echo $transaction['amount'] ?> <?php echo $transaction['currency'] ?></p>
                                <?php } ?>
                                <?php if (isset($transaction['cost'])) { ?> 
                                    <p><strong>Cost:</strong> <?php echo $transaction['cost'] ?></p>
                                <?php } ?>
                                <?php if (isset($transaction['amountrefunded'])) { ?> 
                                    <p><strong>Amount refunded:</strong> <?php echo $transaction['amountrefunded'] ?> <?php echo $transaction['currency'] ?></p>
                                <?php } ?>
                            </div> 
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="payment">
                        <div class="panel panel-info">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">Payment details information: </h3> 
                            </div> 
                            <div class="panel-body"> 
                                <?php if (isset($payment['type'])) { ?>
                                    <p><strong>Type:</strong> <?php echo $payment['type'] ?></p>
                                <?php } ?>
                                <?php if (isset($payment['accountid'])) { ?>
                                    <p><strong>Account id:</strong> <?php echo $payment['accountid'] ?></p>
                                <?php } ?>
                                <?php if (isset($payment['accountholdername'])) { ?>
                                    <p><strong>Account holder name:</strong> <?php echo $payment['accountholdername'] ?></p>
                                <?php } ?>
                                <?php if (isset($payment['cardexpirydate'])) { ?>
                                    <p><strong>Card expiry date:</strong> <?php echo $payment['cardexpirydate'] ?></p>
                                <?php } ?>
                            </div> 
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="customer">
                        <div class="panel panel-info">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">Customer information: </h3> 
                            </div> 
                            <div class="panel-body"> 
                                <div class="row">
                                    <div class="col-md-6"> 
                                        <?php if (isset($customer['amount']) && isset($customer['currency'])) { ?>
                                            <p><strong>Amount:</strong> <?php echo $customer['amount'] ?> <?php echo $customer['currency'] ?></p> 
                                        <?php } ?>
                                        <?php if (isset($customer['locale'])) { ?>
                                            <p><strong>Locale:</strong> <?php echo $customer['locale'] ?></p> 
                                        <?php } ?>
                                        <?php if (isset($customer['firstname'])) { ?>
                                            <p><strong>Firstname:</strong> <?php echo $customer['firstname'] ?></p> 
                                        <?php } ?>
                                        <?php if (isset($customer['lastname'])) { ?>
                                            <p><strong>Lastname:</strong> <?php echo $customer['lastname'] ?></p> 
                                        <?php } ?>
                                        <?php if (isset($customer['address1'])) { ?>
                                            <p><strong>Address1:</strong> <?php echo $customer['address1'] ?></p> 
                                        <?php } ?>
                                        <?php if (isset($customer['housenumber'])) { ?>
                                            <p><strong>House number:</strong> <?php echo $customer['housenumber'] ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6"> 
                                        <?php if (isset($customer['zipcode'])) { ?>
                                            <p><strong>Zip code:</strong> <?php echo $customer['zipcode'] ?></p> 
                                        <?php } ?>
                                        <?php if (isset($customer['city'])) { ?>
                                            <p><strong>City:</strong> <?php echo $customer['city'] ?></p>
                                        <?php } ?>
                                        <?php if (isset($customer['country'])) { ?>
                                            <p><strong>Country:</strong> <?php echo $customer['country'] ?></p> 
                                        <?php } ?>
                                        <?php if (isset($customer['phone1'])) { ?>
                                            <p><strong>Phone 1:</strong> <?php echo $customer['phone1'] ?></p>
                                        <?php } ?>
                                        <?php if (isset($customer['phone2'])) { ?>
                                            <p><strong>Phone 2:</strong> <?php echo $customer['phone2'] ?></p>
                                        <?php } ?>
                                        <?php if (isset($customer['email'])) { ?>
                                            <p><strong>Email:</strong> <?php echo $customer['email'] ?></p>
                                        <?php } ?>
                                    </div>   
                                </div>
                                
                            </div> 
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="cart">
                        <div class="panel panel-info">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">Shopping cart information: </h3> 
                            </div> 
                            <div class="panel-body"> 
                                <?php if (isset($cart)) { ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr> 
                                                <th>Name</th> 
                                                <th>Description</th>
                                                <th>Unit price</th> 
                                                <th>Quantity</th> 
                                                <th>Merchant id</th> 
                                                <th>Tax</th> 
                                                <th>Weight</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cart as $item) { ?>
                                                <tr>
                                                    <?php foreach ($item as $prop) { ?> 
                                                        <td><?php echo $prop;?></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div> 
                        </div> 
                    </div>
                </div>
            <?php } ?>
        </div>
        
        <!-- FOOTER -->
        <footer class="navbar-fixed-bottom">
            <h4 class="text-center">Developed by: Fabián Zafra Rodríguez</h4>
        </footer>
    </body>
</html>

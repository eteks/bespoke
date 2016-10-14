<?php include "templates/header.php"; ?>
<div class="container main-container headerOffset">

    <!-- Main component call to action -->
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Form Elements</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class=" col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse2" class="collapseWill">
                            Radio/checkbox <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <fieldset>

                                    <!-- Form Name -->
                                    <legend>Radio/checkbox</legend>

                                    <!-- Multiple Radios -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="radios-a0">Multiple Radios</label>

                                        <div class="col-md-4">
                                            <div class="radio">
                                                <label for="radios-11">
                                                    <input name="radios-11" id="radios-11" value="1a" checked="checked"
                                                           type="radio">
                                                    Option one </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radios-21">
                                                    <input name="radios-21" id="radios-21" value="2a" type="radio">
                                                    Option two </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Multiple Radios (inline) -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="radios">Inline Radios</label>

                                        <div class="col-md-4">
                                            <label class="radio-inline" for="radios-0">
                                                <input name="radios" id="radios-0" value="1" checked="checked"
                                                       type="radio">
                                                1 </label>
                                            <label class="radio-inline" for="radios-1">
                                                <input name="radios" id="radios-1" value="2" type="radio">
                                                2 </label>
                                            <label class="radio-inline" for="radios-2">
                                                <input name="radios" id="radios-2" value="3" type="radio">
                                                3 </label>
                                            <label class="radio-inline" for="radios-3">
                                                <input name="radios" id="radios-3" value="4" type="radio">
                                                4 </label>
                                        </div>
                                    </div>

                                    <!-- Multiple Checkboxes -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="checkboxes">Multiple
                                            Checkboxes</label>

                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label for="checkboxes-01">
                                                    <input name="checkboxes" id="checkboxes-01" value="1"
                                                           type="checkbox">
                                                    Option one </label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="checkboxes-1">
                                                    <input name="checkboxes" id="checkboxes-1" value="2"
                                                           type="checkbox">
                                                    Option two </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Multiple Checkboxes (inline) -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Inline Checkboxes</label>

                                        <div class="col-md-4">
                                            <label class="checkbox-inline" for="checkboxes-0">
                                                <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
                                                1 </label>
                                            <label class="checkbox-inline" for="checkboxes-1">
                                                <input name="checkboxes" id="checkboxes-1" value="2" type="checkbox">
                                                2 </label>
                                            <label class="checkbox-inline" for="checkboxes-2">
                                                <input name="checkboxes" id="checkboxes-2" value="3" type="checkbox">
                                                3 </label>
                                            <label class="checkbox-inline" for="checkboxes-3">
                                                <input name="checkboxes" id="checkboxes-3" value="4" type="checkbox">
                                                4 </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse1" class="collapseWill"> Input
                            <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <fieldset>

                                    <!-- Form Name -->
                                    <legend>Inputform</legend>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textinput">Text Input</label>

                                        <div class="col-md-4">
                                            <input id="textinput" name="textinput" placeholder="placeholder"
                                                   class="form-control input-md" type="text">
                                            <span class="help-block">help</span></div>
                                    </div>

                                    <!-- Password input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="passwordinput">Password Input</label>

                                        <div class="col-md-4">
                                            <input id="passwordinput" name="passwordinput" placeholder="placeholder"
                                                   class="form-control input-md" type="password">
                                            <span class="help-block">help</span></div>
                                    </div>

                                    <!-- Search input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="searchinput">Search Input</label>

                                        <div class="col-md-4">
                                            <input id="searchinput" name="searchinput" placeholder="placeholder"
                                                   class="form-control input-md" type="search">

                                            <p class="help-block">help text</p>
                                        </div>
                                    </div>

                                    <!-- Prepended text-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="prependedtext">Prepended Text</label>

                                        <div class="col-md-4">
                                            <div class="input-group"><span class="input-group-addon">prepend</span>
                                                <input id="prependedtext" name="prependedtext" class="form-control"
                                                       placeholder="placeholder" type="text">
                                            </div>
                                            <p class="help-block">help text</p>
                                        </div>
                                    </div>

                                    <!-- Appended Input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="appendedtext">Appended Text</label>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input id="appendedtext" name="appendedtext" class="form-control"
                                                       placeholder="placeholder" type="text">
                                                <span class="input-group-addon">append</span></div>
                                            <p class="help-block">help text</p>
                                        </div>
                                    </div>
                                    <!-- Prepended checkbox -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="prependedcheckbox">Prepended
                                            Checkbox</label>

                                        <div class="col-md-4">
                                            <div class="input-group"> <span class="input-group-addon">
                        <input type="checkbox">
                        </span>
                                                <input id="prependedcheckbox" name="prependedcheckbox"
                                                       class="form-control" placeholder="placeholder" type="text">
                                            </div>
                                            <p class="help-block">help text</p>
                                        </div>
                                    </div>

                                    <!-- Appended checkbox -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="appendedcheckbox">Appended
                                            Checkbox</label>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input id="appendedcheckbox" name="appendedcheckbox"
                                                       class="form-control" placeholder="placeholder" type="text">
                        <span class="input-group-addon">
                        <input type="checkbox">
                        </span></div>
                                            <p class="help-block">help text</p>
                                        </div>
                                    </div>

                                    <!-- Button Drop Down -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="buttondropdown">Button Drop
                                            Down</label>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input id="buttondropdown" name="buttondropdown" class="form-control"
                                                       placeholder="placeholder" type="text">

                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default dropdown-toggle"
                                                            data-toggle="dropdown"> Action <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li><a href="#">Option one</a></li>
                                                        <li><a href="#">Option two</a></li>
                                                        <li><a href="#">Option three</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Textarea -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textarea">Text Area</label>

                                        <div class="col-md-4">
                                            <textarea class="form-control" id="textarea" name="textarea">default
                                                text</textarea>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse4" class="collapseWill"> Select
                            <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <fieldset>


                                    <!-- Select Basic -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="selectbasic">Select Basic</label>

                                        <div class="col-md-4">
                                            <select id="selectbasic" name="selectbasic" class="form-control">
                                                <option value="1">Option one</option>
                                                <option value="2">Option two</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-toggle="collapse" href="#collapse5" class="collapseWill"> Button
                            <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse  in">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <fieldset>

                                    <!-- Form Name -->
                                    <legend>Button</legend>

                                    <!-- File Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="filebutton">File Button</label>

                                        <div class="col-md-4">
                                            <input id="filebutton" name="filebutton" class="input-file" type="file">
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="singlebutton">Single Button</label>

                                        <div class="col-md-4">
                                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">
                                                Button
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Button (Double) -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="button1id">Double Button</label>

                                        <div class="col-md-8">
                                            <button id="button1id" name="button1id" class="btn btn-success">Success
                                                Button
                                            </button>
                                            <br>
                                            <br>
                                            <button id="button2id" name="button2id" class="btn btn-danger">Danger
                                                Button
                                            </button>
                                            <br>
                                            <br>
                                            <button id="button2id" name="button2id" class="btn btn-default">default
                                                Button
                                            </button>
                                            <br>
                                            <br>
                                            <button id="button2id" name="button2id" class="btn btn-info">info Button
                                            </button>
                                            <br>
                                            <br>
                                            <button id="button2id" name="button2id" class="btn btn-primary">primary
                                                Button
                                            </button>
                                            <br>
                                            <br>
                                            <button id="button2id" name="button2id" class="btn btn-warning">warning
                                                Button
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main container -->
<?php include "templates/footer.php"; ?>
<?php echo $this->Form->create("Push");?>
    <div class="row">
        <div class="col">
            <br><h5>PRIMARY SECTION</h5><hr>
            <div class="form-group">
                <?php echo $this->Form->input("title",["class" => "form-control","placeholder" => "Enter Title *","required" => "true"]);?>
                <small id="titleHelp" class="form-text text-muted">Maximum Character length is 96.</small>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input("content",["class" => "form-control","rows" => "3","placeholder" => "Enter Content *","required" => "true"]);?>
                 <small id="conteHelp" class="form-text text-muted">Maximum Character length is 100.</small>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input("landingPage",["type" => "url","class" => "form-control","placeholder" => "Enter Landing Url *","required" => "true"]);?>
                <small id="urlHelp" class="form-text text-muted">When the user click the push notification what will happen?</small>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input("icon",["type" => "file","class" => "form-control"]);?>
                <small id="iconHelp" class="form-text text-muted">Maximum Size :  Best Fit : </small>
            </div>
        </div>
        <div class="col">
            <br><h5>Advance Section</h5><hr>
            <div class="form-group">
                <?php echo $this->Form->input("image",["type" => "file","class" => "form-control"]);?>
                <small id="iconHelp" class="form-text text-muted">The Image you want to put in your push notification</small>
            </div>    
            <div class="form-group">
                <?php echo $this->Form->input("actionButtons",["type" => "select","class" => "form-control","options" => ["1" => "1","2" => "2"]]);?>
                <small id="actionButtonHelp" class="form-text text-muted">This is only applicable to google chrome users in window.</small>
             </div>
            <div class="form-group">
                <?php echo $this->Form->input("hideDelay",["type" => "number","class" => "form-control","placeholder" => "Enter Duration *","min" => "1"]); ?>
                <small id="hideDelay" class="form-text text-muted">Decide if how long does this notifcation will last in terms of seconds.</small>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input("schedulePush",["type" => "datetime-local","value" => "2018-07-10","class" => "form-control","placeholder" => "Enter The Time and date you want to trigger such PUSH *"]); ?>
                <small id="schedulePush" class="form-text text-muted">This will automatically trigger a push notification at a given time.</small>
            </div>
             <?php echo $this->Form->submit("Send Push",["class" => "btn btn-success","style" => "height:70px;width:100%;font-size:25px;"]);?>
             <?php echo $this->Form->end()?>
        </div>
    </div>
</form>
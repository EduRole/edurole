<script type="text/javascript">
	Aloha.ready( function() {
		var $ = Aloha.jQuery;
		$('.editable').aloha();
	});
</script>

<form id="addfee" name="addfee" method="post" action="<? echo $this->core->conf['conf']['path'] . "/fees/save/" . $this->core->item; ?>">
	<p>Please enter the following information</p>
        <input type="hidden" name="packageid" value="<?php echo $packageid; ?>" />
	<table width="768" border="0" cellpadding="5" cellspacing="0">
              <tr>
                <td width="205" height="28" bgcolor="#EEEEEE"><strong>Information</strong></td>
                <td width="200" bgcolor="#EEEEEE"><strong>Input field</strong></td>
                <td  bgcolor="#EEEEEE"><strong>Description</strong></td>
              </tr>
              <tr>
                <td><strong>Fee Package Name </strong></td>
                <td>
                  <input type="text" name="name" value="<?php echo $name; ?>" /></td>
                <td>Name of fee</td>
              </tr>
              <tr>
                <td><strong>Fee Package Manager</strong></td>
                <td>
                  <select name="owner" id="owner">
			<?php echo $owner; ?>
                  </select></td>
                <td>Functional head of fee</td>
              </tr>
              <tr>
                <td><strong>Optional description</strong></td>
                <td>
			<textarea rows="4" cols="37" class="editable" name="description"><?php echo $description; ?></textarea>
		  </td>
                <td></td>
              </tr>
              <tr>
                <td><strong>Amount </strong></td>
                <td>
                  <input type="text" name="amount" value="<?php echo $amount; ?>" /></td>
                <td>Amount to be payed</td>
              </tr>
            </table>
		<br />

	  <input type="submit" class="submit" name="submit" id="submit" value="Update Fee Package" />
        <p>&nbsp;</p>

      </form>
<!DOCTYPE html>
<html>
	<body>

		<!--Upload Solution Modal-->
		<div class="modal fade solution-modal" id="solution-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">Modal title</h4>
					</div>

					<div class="modal-body">
						<p>
							<form id="upload-solution-form" name="upload-solution-form" enctype="multipart/form-data" action="engine.php" method="get">

								<div class="alert alert-info">
									Please note to upload more than one file, please select files while pressing CTRL or SHIFT buttons.
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
										<span class="sr-only statustxt">0% Complete</span>
									</div>
								</div>
								<input name="solutionfiles[]" type="file" id="solutions"/>
								<input type="hidden" name="solutionId" id="solution-id" value="">
								<input type="hidden" name="flag" id="flag" value="save-solution">
								<span class="selected files"> </span>
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-warning" id="btn-solution">
							Save solution
						</button>
					</div></form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<div class="modal fade UImodal" id="create-programmer-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<p>
							<form>
								<div id="console"></div>
								<div class="form-group">
									<label for="firstName">First Name</label>
									<input type="text" class="form-control" id="firstName" placeholder="Enter Programmers First Name">
								</div>

								<div class="form-group">
									<label for="secondName">Second Name</label>
									<input type="text" class="form-control" id="secondName" placeholder="Enter Programmers second name">
								</div>
								<div class="form-group">
									<label for="emailAddress">Email Address</label>
									<input type="email" class="form-control" id="emailAddress" placeholder="Enter Programmers email">
								</div>

								<div class="form-group">
									<label for="location">Location</label>
									<input type="text" class="form-control" id="location" placeholder="Enter Programmers Location">
								</div>

								<div class="form-group">
									<label for="phoneNumber">Phone Number</label>
									<input type="text" class="form-control" id="phoneNumber" placeholder="Enter Programmers Phone Number">
								</div>

								<div class="form-group">
									<label for="languages">Languages</label>
									<input type="text" class="form-control" id="languages" placeholder="Enter languages programmer can do">
								</div>

								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" placeholder="Enter desired username">
								</div>
							</form>
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button>
						<button type="button" class="btn btn-primary modal-button" id="createprogrammer-modal">
							Save changes
						</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	</body>
</html>
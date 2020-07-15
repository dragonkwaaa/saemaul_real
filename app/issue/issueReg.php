<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/pages/head.php';
	$lCode					=	'0105';

	$userType 				=	$User->userType();
	$incNo 					=	$User->incNo();
	$userNo 				=	$User->userNo();

?>
<body>

<div class="container">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/pages/header.php'; ?>

	<div class="wrapper">
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/pages/leftMenu.php'; ?>
		<div class="contents">
			<div class="section regimentSect">
			<form name="frm" id="frm" onkeypress="return captureReturnKey(event)">
				<input type="hidden" name="token" value="<?=$_SESSION['token'][$Common->nowPage()]?>">
				<input type="hidden" name="userType" value="<?= $userType?>">
				<input type="hidden" name="incNo" value="<?= $incNo?>">
				<input type="hidden" name="corpCode" value="">
				<input type="hidden" name="corpName" value="">
				<input type="hidden" name="vaultNo" value="0">
				<input type="hidden" name="vaultKey" value="0">
				<input type="hidden" name="vaultCode" value="0">
				<input type="hidden" name="vaultName" value="0">
				<input type="hidden" name="kindNo" value="0">
				<input type="hidden" name="modelNo" value="0">
				<input type="hidden" name="userNo_as" value="0">
				<input type="hidden" name="userNo_office" value="<?= $userNo?>">
				<input type="hidden" name="issueKindStateType" value="0">
				<input type="hidden" name="issueReceivedType" value="0">

				<input type="hidden" name="issueReserveTime" value="">
				<input type="hidden" name="issueReserveMin" value="">

				<input type="hidden" name="issueSolveType" value="0">
				<input type="hidden" name="issueSolveDate" value="">
				<input type="hidden" name="issueSolveSTime" value="">
				<input type="hidden" name="issueSolveSMin" value="">
				<input type="hidden" name="issueSolveETime" value="">
				<input type="hidden" name="issueSolveEMin" value="">

				<input type="hidden" name="searchType" value="">

				<div class="titleBox sectionSort">장애접수등록</div>
				<div class="conGroup regInfoSort">


					<div class="titleIndicator bottomGap topFlat">검색어</div>
					<div class="mt15 inRegSearchGroup">
						<!--<span class="sbox ">
							<a href="javascript:void(0);" id="tempSearchType">검색어 선택</a>
							<ul>
								<li><a href="javascript:setSearchType('금고코드', 1);">금고코드</a></li>
								<li><a href="javascript:setSearchType('금고명', 3);">금고명</a></li>
							</ul>
						</span>-->
						<input class="tbox" placeholder="금고명 또는 금고코드를 입력해주세요" name="searchWord">
						<a href="javascript:search_vault();" class="btn f_white bg_emerald withTbox searchMod">검색</a>
						<table class="listTable searchResultMod">
							<colgroup>
								<col width="30">
								<col width="30">
								<col width="30">
								<col width="30">
								<col width="30">
								<col width="30">
								<col width="30">
								<col width="100">
								<col width="30">
							</colgroup>
							<thead>
							<tr>
								<th>금고코드</th>
								<th>금고명</th>
								<th>지점코드</th>
								<th>지점명</th>
								<th>지사명</th>
								<th>담당자</th>
								<th>금고전화번호</th>
								<th>주소</th>
								<th>선택</th>
							</tr>
							</thead>
							<tbody id="vaultList">
							<!--<tr>
								<td>제주지사</td>
								<td>제주 서귀포시 성산읍 11-11</td>
								<td>02-0033-0000</td>
								<td>곽반장</td>
								<td>
									<a href="javascript:set_vault();" class="btn modifySort">선택</a>
								</td>
							</tr>-->
							</tbody>
						</table>
					</div>
					<div class="titleIndicator bottomGap">금고명</div>
					<div class="mt15 relativeSort">
						<input class="tbox shortMod" placeholder="금고명" readonly name="vaultInfo" id="vaultInfo">
					</div>
					<div class="titleIndicator bottomGap">지사명</div>
					<div class="mt15 relativeSort">
						<input class="tbox shortMod" placeholder="지사명" readonly name="incName">
					</div>
					<div class="titleIndicator bottomGap">지점명</div>
					<div class="mt15">
						<input class="tbox shortMod" placeholder="지점명" readonly name="corpName">
					</div>
					<div class="titleIndicator bottomGap">담당자</div>
					<div class="mt15">
						<span class="sbox">
							<a href="javascript:void(0);" id="setASName">담당자선택</a>
							<ul id="asStaffList">
								<!--<li><a href="javascript:void(0);">기사1</a></li>
								<li><a href="javascript:void(0);">기사2</a></li>-->
							</ul>
						</span>
					</div>
					<div class="titleIndicator bottomGap">기기유형</div>
					<div class="mt15">
						<span class="sbox">
							<a href="javascript:void(0);" id="setKindName">기종선택</a>
							<ul id="kindList">
								<!--<li><a href="javascript:void(0);">기종1</a></li>
								<li><a href="javascript:void(0);">기종2</a></li>-->
							</ul>
						</span>
						<span class="sbox ml7">
							<a href="javascript:void(0);" id="setModelName">모델선택</a>
							<ul id="modelList">
							</ul>
						</span>
					</div>
					<div class="titleIndicator bottomGap">주소</div>
					<div class="mt15">
						<input class="tbox long" placeholder="금고주소" id="vaultAddr" readonly/>
					</div>
					<div class="titleIndicator bottomGap">전화번호</div>
					<div class="mt15">
						<input class="tbox onlyNum" placeholder="전화번호를 입력해주세요" name="customerMobile"/>
					</div>
					<div class="titleIndicator bottomGap">의뢰자명</div>
					<div class="mt15">
						<input class="tbox long" placeholder="의뢰자를 입력해주세요" name="customerName"/>
					</div>
					<div class="titleIndicator bottomGap">접수시간</div>
					<div class="dateSelectGroup mt15">
						<div class="dateInputCase">
							<input class="tbox dateBox shortMod" id="startDate" readonly  placeholder="접수 날짜" name="issueReserveDate">
						</div>
					</div>
					<div class="mt15">
						<span class="sbox">
							<a href="javascript:void(0);" id="setReserveTimeStr">접수 시간(시)</a>
							<ul>
								<?php for($i = 00 ; $i <=  23; $i ++){ ?>
								<li><a href="javascript:setReserveTime(<?= $i?>);"><?= $i?></a></li>
								<?php } ?>

							</ul>
						</span>
						<span class="sbox ml7">
							<a href="javascript:void(0);" id="setReserveMinStr">접수 시간(분)</a>
							<ul>
								<?php for($i = 00 ; $i <=  60; $i ++){ ?>
								<li><a href="javascript:setReserveMin(<?= $i?>);"><?= $i?></a></li>
								<?php } ?>
							</ul>
						</span>
					</div>
					<div class="titleIndicator bottomGap">접수내용</div>
					<div class="mt15">
						<input class="tbox long" placeholder="접수 내용을 입력해주세요" name="issueComment"/>
					</div>
					<div class="titleIndicator bottomGap">접수구분</div>
					<div class="mt15">
						<span class="sbox">
							<a href="javascript:void(0);" id="setKindStateTypeStr">기기상태 선택</a>
							<ul>
								<li><a href="javascript:setKindStateType('가동중', 1);">가동중</a></li>
								<li><a href="javascript:setKindStateType('기기OFF', 2);">기기OFF</a></li>
								<li><a href="javascript:setKindStateType('복구불가', 3);">복구불가</a>
								<li><a href="javascript:setKindStateType('기타', 4);">기타</a></li>
							</ul>
						</span>
						<span class="sbox ml7">
							<a href="javascript:void(0);" id="setReceivedTypeStr">접수구분 선택</a>
							<ul>
								<li><a href="javascript:setReceivedType('금고접수', 1);">금고접수</a></li>
								<li><a href="javascript:setReceivedType('현장접수', 2);">현장접수</a></li>
							</ul>
						</span>
					</div>	
				</div>
				<div class="titleBox sectionSort">장애처리관리</div>
				<div class="conGroup regInfoSort">
					<div class="titleIndicator bottomGap topFlat">처리날짜</div>
					<div class="dateSelectGroup">
						<div class="dateInputCase">
							<input class="tbox dateBox shortMod" id="endDate" readonly placeholder="처리 날짜" name="issueSolveDate">
						</div>
					</div>
					<div class="titleIndicator bottomGap">처리유형</div>
					<div>
						<span class="sbox">
							<a href="javascript:void(0);" id="setSolveTypeStr">처리유형 선택</a>
							<ul>
								<li><a href="javascript:setSolveType('처리', 1);">처리</a></li>
								<li><a href="javascript:setSolveType('미처리', 2);">미처리</a></li>
								<li><a href="javascript:setSolveType('업체이관', 3);">업체이관</a></li>
								<li><a href="javascript:setSolveType('기타', 4);">기타</a></li>
							</ul>
						</span>
					</div>
					<div class="titleIndicator bottomGap">처리 시작시간</div>
					<div class="mt15">
						<span class="sbox">
							<a href="javascript:void(0);" id="setSolveSTimeStr">시작시간(시)</a>
							<ul>
								<?php for($i = 00 ; $i <=  23; $i ++){ ?>
								<li><a href="javascript:setSolveSTime(<?= $i?>);"><?= $i?></a></li>
								<?php } ?>
							</ul>
						</span>
						<span class="sbox ml7">
							<a href="javascript:void(0);" id="setSolveSMinStr">시작시간(분)</a>
							<ul>
								<?php for($i = 00 ; $i <=  60; $i ++){ ?>
								<li><a href="javascript:setSolveSMin(<?= $i?>);"><?= $i?></a></li>
								<?php } ?>
							</ul>
						</span>
					</div>
					<div class="titleIndicator bottomGap">처리 종료시간</div>
					<div class="mt15">
						<span class="sbox">
							<a href="javascript:void(0);" id="setSolveETimeStr">종료시간(시)</a>
							<ul>
								<?php for($i = 00 ; $i <=  23; $i ++){ ?>
								<li><a href="javascript:setSolveETime(<?= $i?>);"><?= $i?></a></li>
								<?php } ?>
							</ul>
						</span>
						<span class="sbox ml7">
							<a href="javascript:void(0);" id="setSolveEMinStr">종료시간(분)</a>
							<ul>
								<?php for($i = 00 ; $i <=  60; $i ++){ ?>
								<li><a href="javascript:setSolveEMin(<?= $i?>);"><?= $i?></a></li>
								<?php } ?>
							</ul>
						</span>
					</div>
					<div class="titleIndicator bottomGap">처리 내용</div>
					<div class="mt15">
						<input class="tbox long" placeholder="처리내용을 입력해주세요" name="issueSolveComment"/>
					</div>
					<div class="titleIndicator bottomGap">정기점검 여부</div>
					<div class="tabGroup conRadioSort mt15">
						<ul>
							<li>
								<div class="radioCase">
									<div class="radioIconBox">
										<input type="radio" name="isRegularCheck" value="1" >
										<label></label>
									</div>
									<div class="radioTitle">정기점검 완료</div>
								</div>
							</li>
							<li>
								<div class="radioCase">
									<div class="radioIconBox">
										<input type="radio" name="isRegularCheck" value="2" checked>
										<label></label>
									</div>
									<div class="radioTitle">정기점검 미완료</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="mt38">
						<div class="f_charcooal">이미지 업로드</div>
						<div class="sizeFixImg mt22">
							<div class="imgUploadBox">
								<input type="file" class="hide" accept="image/*" name="img_1" onchange="img_sel(this, event)">
								<a href="javascript:void(0)" class="upload_btn" onclick="img_upload(this)"></a>
							</div>
						</div>
					</div>
				</div>
				<div class="btnGroup">
					<a href="javascript:insert_issue();" class="btn f_white bg_navy">저장</a>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script src="/common/js/datePick.js"></script>
<script src="/common/js/exif-js.js"></script>
<script src="/common/js/imgSet.js"></script>
<script src="/issue/js/issueReg.js"></script>
<script src="/issue/js/issueCommon.js"></script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
</body>
</html>
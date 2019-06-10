$(function(){
	$("input[name=flightPlan]").on("change",function(){
		var flight_type = $(this).val();
		$(".flight_date_select>.flight").removeClass('active');
		$(".flight_date_select ." + flight_type).addClass('active');
	});

	var fcount=1;

	$(".add_flight").on("click", function () {
		var newRow = $('<div class="added_flight d-flex align-items-center mt-2">');
		var cols = "";

		cols += '<input type="text" name="flight_from_place' + fcount + '" id="flight_from_place' + fcount + '" value="" placeholder="FROM">';
		cols += '<img src="images/fromto.png" class="px-2" />';
		cols += '<input type="text" name="flight_to_place' + fcount + '" id="flight_to_place' + fcount + '" value="" placeholder="TO" />';
		cols += '<input type="text" onfocus="(this.type=\'date\')" onblur="(this.type=\'text\')" name="flight_from_date' + fcount + '" class="date ml-2" id="flight_from_date' + fcount + '" value="" placeholder="DEPART" />';

		cols += '<a href="javascript:;" class="delete_flight ml-2" title="delete">x</a>';
		cols += '</div>';
		newRow.append(cols);
		$(".multi_flights_cont").append(newRow);
		fcount++;
	});

	$(".multi_flights_cont").on("click", ".delete_flight", function (event) {
		$(this).closest(".added_flight").remove();       
		fcount -= 1;
	});

	$(".copyright a").on("click",function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});

	$(".packages_map  .row>div a").on("click",function(){
		var selected_continent = $(this).attr("id");
		$(".appended_continent").remove();
		if( $(this).hasClass("active")){
			$(".packages_offers .row>div").show();
			$(this).removeClass("active");
		}
		else{
			$(".po_title").append("<div class='appended_continent'>"+selected_continent.replace(/_/g,' ').replace('and','&')+"</div>");
			$(".packages_map  .row>div a").removeClass("active");
			$(this).addClass("active");

			$(".packages_offers .row>div").hide();
			$(".packages_offers .row>div." + selected_continent).show();
		}
	});

	$("div.st_tab-menu>div.list-group>a").click(function(e) {
		e.preventDefault();
		$(this).siblings('a.active').removeClass("active");
		$(this).addClass("active");
		var index = $(this).index();
		$("div.st_tab>div.st_tab_content").removeClass("active");
		$("div.st_tab>div.st_tab_content").eq(index).addClass("active");
	});

	$(".reset_callback").on("click",function(e){
		e.preventDefault();
		$("#contactForm")[0].reset();
	});

	$(".showloc").on("click",function(){
		$(".contactMap iframe").toggle();
	});

	var url = window.location.href;
	if( url.indexOf("#") != -1 ){
		
		var urlTab = url.substring(url.indexOf("#")+1);
		var activeTab; 

		if(urlTab == "nav_insurance"){
			activeTab = 'nav-insurance-tab';
			$('.travelInsuranceLink').parent("li").addClass("active");
		}
		else{
			activeTab = 'nav_flight-tab';
		}
		$('#'+ activeTab).tab('show');
		
	}

	$("#nav_flight-tab").on("click",function(){
		$(".travelInsuranceLink").parent("li").removeClass("active");
	});

	$(".travelInsuranceLink").on("click",function(e){
		var activeTab = "nav-insurance-tab";
		$('#'+ activeTab).tab('show');
		console.log($('.travelInsuranceLink').parent("li").html());
		$('.travelInsuranceLink').parent("li").addClass("active");
	});
	$(".bookTicketLink").on("click",function(e){
		var url = window.location.href;
		if( url.indexOf("#") != -1 ){
			var activeTab = "nav_flight-tab";
			$('#'+ activeTab).tab('show');
			$('.travelInsuranceLink').parent("li").removeClass("active");
		}
	});

	if( $(window).width() <= 640 ){
		$(".serviceTitleCont .list-group-item").on("click",function(){
			$("html, body").animate({ scrollTop: 970}, "slow");
		});

		$(".packages_map a").on("click",function(){
			$("html, body").animate({ scrollTop: 1300}, "slow");
		});
		$(".travelInsuranceLink,.bookTicketLink").on("click",function(e){
			$("html, body").animate({ scrollTop: 600}, "slow");
		});
	}
	

});
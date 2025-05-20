
; /* Start:"a:4:{s:4:"full";s:89:"/bitrix/components/bitrix/forum.interface/templates/.default/script.min.js?17472853442967";s:6:"source";s:70:"/bitrix/components/bitrix/forum.interface/templates/.default/script.js";s:3:"min";s:74:"/bitrix/components/bitrix/forum.interface/templates/.default/script.min.js";s:3:"map";s:74:"/bitrix/components/bitrix/forum.interface/templates/.default/script.map.js";}"*/
if(typeof window.WaitOnKeyPress!="function"){function WaitOnKeyPress(e){if(!e)e=window.event;if(!e)return;if(e.keyCode==27)CloseWaitWindow()}}if(typeof window.ShowWaitWindow!="function"){function ShowWaitWindow(){CloseWaitWindow();var e=jsUtils.GetWindowSize();var t=document.body.appendChild(document.createElement("DIV"));t.id="wait_window_div";t.innerHTML=BX.message("F_LOAD");t.className="waitwindow";t.style.right=5-e.scrollLeft+"px";t.style.top=e.scrollTop+5+"px";if(jsUtils.IsIE()){var i=document.createElement("IFRAME");i.src="javascript:''";i.id="wait_window_frame";i.className="waitwindow";i.style.width=t.offsetWidth+"px";i.style.height=t.offsetHeight+"px";i.style.right=t.style.right;i.style.top=t.style.top;document.body.appendChild(i)}jsUtils.addEvent(document,"keypress",WaitOnKeyPress)}}if(typeof window.CloseWaitWindow!="function"){function CloseWaitWindow(){jsUtils.removeEvent(document,"keypress",WaitOnKeyPress);var e=document.getElementById("wait_window_frame");if(e)e.parentNode.removeChild(e);var t=document.getElementById("wait_window_div");if(t)t.parentNode.removeChild(t)}}function FCloseWaitWindow(e){e="wait_container"+e;var t=document.getElementById(e+"_frame");if(t)t.parentNode.removeChild(t);var i=document.getElementById(e);if(i)i.parentNode.removeChild(i);return}function FShowWaitWindow(e){e="wait_container"+e;FCloseWaitWindow(e);var t=document.body.appendChild(document.createElement("DIV"));t.id=e;t.innerHTML=BX.message("F_LOAD");t.className="waitwindow";t.style.left=document.body.scrollLeft+(document.body.clientWidth-t.offsetWidth)-5+"px";t.style.top=document.body.scrollTop+5+"px";if(jsUtils.IsIE()){var i=document.createElement("IFRAME");i.src="javascript:''";i.id=e+"_frame";i.className="waitwindow";i.style.width=t.offsetWidth+"px";i.style.height=t.offsetHeight+"px";i.style.left=t.style.left;i.style.top=t.style.top;document.body.appendChild(i)}return}function FCancelBubble(e){if(!e)e=window.event;if(jsUtils.IsIE()){e.returnValue=false;e.cancelBubble=true}else{e.preventDefault();e.stopPropagation()}return false}function debug_info(e){container_id="debug_info_forum";var t=document.getElementById(container_id);if(!t||t==null){t=document.body.appendChild(document.createElement("DIV"));t.id=container_id;t.className="forum-debug";t.style.position="absolute";t.style.width="170px";t.style.padding="5px";t.style.backgroundColor="#FCF7D1";t.style.border="1px solid #EACB6B";t.style.textAlign="left";t.style.zIndex="100";t.style.fontSize="11px";t.style.left=document.body.scrollLeft+(document.body.clientWidth-t.offsetWidth)-5+"px";t.style.top=document.body.scrollTop+5+"px";if(jsUtils.IsIE()){var i=document.createElement("IFRAME");i.src="javascript:''";i.id=container_id+"_frame";i.className="waitwindow";i.style.width=t.offsetWidth+"px";i.style.height=t.offsetHeight+"px";i.style.left=t.style.left;i.style.top=t.style.top;document.body.appendChild(i)}}t.innerHTML+=e+"<br />";return}
/* End */
;
; /* Start:"a:4:{s:4:"full";s:107:"/bitrix/components/bitrix/forum/templates/.default/bitrix/forum.pm.folder/.default/script.js?17472853423200";s:6:"source";s:92:"/bitrix/components/bitrix/forum/templates/.default/bitrix/forum.pm.folder/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
if (typeof oForum != "object")
	var oForum = {};
if (typeof oForum["selectors"] != "object")
	oForum["selectors"] = {};

function FSelectAll(oObj, name, bRestore)
{
	if (typeof oObj != "object" || oObj == null || !name)
		return false;
	var sSelectorName = 'all_' + name.replace(/[^a-z0-9]/ig, "_");
	bRestore = (bRestore == "Y" ? "Y" : "N");
	var items = oObj.form.getElementsByTagName('input');
	var iItemsChecked = [];
	if (items)
	{
		if (!items.length || (typeof(items.length) == 'undefined'))
			items = [items];
		window.oForum["selectors"][sSelectorName] = {"count" : 0, "current" : 0};
		for (var ii = 0; ii < items.length; ii++)
		{
			if (!(items[ii].type == "checkbox" && items[ii].name == name))
				continue;
			window.oForum["selectors"][sSelectorName]["count"]++;
			if (bRestore == "Y" && items[ii].checked != oObj.checked)
				iItemsChecked.push(ii);
			onClickCheckbox(items[ii], (oObj.checked ? "Y" : "N"));
		}
		if (oObj.checked)
			window.oForum["selectors"][sSelectorName]["current"] = window.oForum["selectors"][sSelectorName]["count"];
		else
			window.oForum["selectors"][sSelectorName]["current"] = 0;

		if (iItemsChecked.length > 0)
		{
			for (var ii = 0; ii < iItemsChecked.length; ii++)
				onClickCheckbox(items[iItemsChecked[ii]], (oObj.checked ? "N" : "Y"));
			if (window.oForum["selectors"][sSelectorName]["current"] == window.oForum["selectors"][sSelectorName]["count"])
				oObj.form[sSelectorName].checked = true;
			else
				oObj.form[sSelectorName].checked = false;
		}
	}
	return;
}

function Validate(form)
{
	var bError = true;
	var items = form.getElementsByTagName('input');
	if (items)
	{
		
		if (!items.length || (typeof(items.length) == 'undefined'))
			items = [items];
		for (var ii = 0; ii < items.length; ii++)
		{
			if (!(items[ii].type == "checkbox" && items[ii].name == 'FID[]' && items[ii].checked && !items[ii].disabled))
				continue;
			bError = false;
			break;
		}
	}
	if (bError)
	{
		alert(oText['s_no_data']);
		return false;
	}
	if (form.action.value == 'delete')
		return confirm(oText['s_del']);
	else if (form.action.value == 'remove')
		return confirm(oText['s_del_mess']);
	return true;
}

function onClickCheckbox(oCheckBox, sSetValue)
{
	if (!oCheckBox)
		return false;
	var sSelectorName = 'all_' + oCheckBox.name.replace(/[^a-z0-9]/ig, "_");
	if (typeof(window.oForum["selectors"][sSelectorName]) != "object" || window.oForum["selectors"][sSelectorName] == null)
	{
		FSelectAll(oCheckBox.form[sSelectorName], oCheckBox.name, "Y");
		return true;
	}
	if (sSetValue == "N")
	{
		window.oForum["selectors"][sSelectorName]["current"]--;
		oCheckBox.checked = false;
	}
	else if (sSetValue == "Y")
	{
		window.oForum["selectors"][sSelectorName]["current"]++;
		oCheckBox.checked = true;
	}
	else
	{
		if (oCheckBox.checked)
			window.oForum["selectors"][sSelectorName]["current"]++;
		else
			window.oForum["selectors"][sSelectorName]["current"]--;
		
		if (oCheckBox.form[sSelectorName])
		{
			if (window.oForum["selectors"][sSelectorName]["current"] == window.oForum["selectors"][sSelectorName]["count"])
				oCheckBox.form[sSelectorName].checked = true;
			else
				oCheckBox.form[sSelectorName].checked = false;
		}
	}
}
/* End */
;; /* /bitrix/components/bitrix/forum.interface/templates/.default/script.min.js?17472853442967*/
; /* /bitrix/components/bitrix/forum/templates/.default/bitrix/forum.pm.folder/.default/script.js?17472853423200*/

//# sourceMappingURL=page_7194e6180f89456b53db635476afc495.map.js
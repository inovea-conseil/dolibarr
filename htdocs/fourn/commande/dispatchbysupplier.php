<?php
/* Copyright (C) 2004-2006 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2016 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005      Eric Seigne          <eric.seigne@ryxeo.com>
 * Copyright (C) 2005-2009 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2010-2021 Juanjo Menent        <jmenent@2byte.es>
 * Copyright (C) 2014      Cedric Gross         <c.gross@kreiz-it.fr>
 * Copyright (C) 2016      Florian Henry        <florian.henry@atm-consulting.fr>
 * Copyright (C) 2017-2022 Ferran Marcet        <fmarcet@2byte.es>
 * Copyright (C) 2018-2022 Frédéric France      <frederic.france@netlogic.fr>
 * Copyright (C) 2019-2020 Christophe Battarel	<christophe@altairis.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * \file htdocs/fourn/commande/dispatch.php
 * \ingroup commande
 * \brief Page to dispatch receiving
 */

// Load Dolibarr environment
require '../../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/core/modules/supplier_order/modules_commandefournisseur.php';
require_once DOL_DOCUMENT_ROOT.'/product/stock/class/entrepot.class.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/fourn.lib.php';
require_once DOL_DOCUMENT_ROOT.'/fourn/class/fournisseur.commande.class.php';
require_once DOL_DOCUMENT_ROOT.'/fourn/class/fournisseur.commande.dispatch.class.php';
require_once DOL_DOCUMENT_ROOT.'/product/class/html.formproduct.class.php';
require_once DOL_DOCUMENT_ROOT.'/product/stock/class/mouvementstock.class.php';

if (isModEnabled('project')) {
	require_once DOL_DOCUMENT_ROOT.'/projet/class/project.class.php';
}

// Load translation files required by the page
$langs->loadLangs(array("bills", "orders", "sendings", "companies", "deliveries", "products", "stocks", "receptions"));

if (isModEnabled('productbatch')) {
	$langs->load('productbatch');
}

	// Security check
$id = GETPOST("id", 'int');
$ref = GETPOST('ref');
$lineid = GETPOST('lineid', 'int');
$action = GETPOST('action', 'aZ09');
$fk_default_warehouse = GETPOST('fk_default_warehouse', 'int');
$cancel = GETPOST('cancel', 'alpha');
$confirm = GETPOST('confirm', 'alpha');

if ($user->socid) {
	$socid = $user->socid;
}

$hookmanager->initHooks(array('supplierdispatch'));

if(!empty($id) && $id>0){
	$supplier = new CommandeFournisseur($db);
	$res = $supplier->fetchBySupplier($id);
	if($res){

	}
	echo "<pre>" . print_r($res, 1) . "</pre>";
}

// End of page
llxFooter();
$db->close();

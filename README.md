
#Test Multisafepay

## Description

The purpose of this test is the creation of a  very simple application using different techniques.
The project delivery can be done using bit bucket or git repository (preferred) or as a zip file.

Frontend

Use Bootstrap as the css Framework.

Via XHR, do a request to backend and display order information using Javascript (jQuery, Angularjs can be used)

1.	Ewallet
2.	Transaction info
3.	Payment Details
4.	Customer info
5.	Shopping cart

Backend

OOP PHP custom code or using FuelPhp framework.

Do a request to XML Api and parse the order information.

To display the shopping cart
Use:
<shopping-cart>
<items>

* Ignore the one with html:
<transaction>
	<items>

-------------------------------------------------------------------------------------------------------------------------
XML Api Request (NOTE: Replace {TRANSACTION ID} with a valid transaction id.)


POST - https://devapi.multisafepay.com/ewx/

<?xml version="1.0" encoding="UTF-8"?>  
<status ua="custom-1.1">  
    <merchant>  
      <account>11018887</account>  
       <site_id>393</site_id>  
       <site_secure_code>970443</site_secure_code>  
   </merchant>  
   <transaction>  
       <id>{TRANSACTION ID}</id> 
   </transaction>  
</status>

#FuelPHP

* Version: 1.8
* [Website](http://fuelphp.com/)
* [Release Documentation](http://docs.fuelphp.com)
* [Release API browser](http://api.fuelphp.com)
* [Development branch Documentation](http://dev-docs.fuelphp.com)
* [Development branch API browser](http://dev-api.fuelphp.com)
* [Support Forum](http://fuelphp.com/forums) for comments, discussion and community support

## Description

FuelPHP is a fast, lightweight PHP 5.3+ framework. In an age where frameworks are a dime a dozen, We believe that FuelPHP will stand out in the crowd.  It will do this by combining all the things you love about the great frameworks out there, while getting rid of the bad.

FuelPHP is fully PHP 7 compatible.

## More information

For more detailed information, see the [development wiki](https://github.com/fuelphp/fuelphp/wiki).

##Development Team

* Harro Verton - Project Manager, Developer ([http://wanwizard.eu/](http://wanwizard.eu/))
* Steve West - Core Developer, ORM
* Márk Sági-Kazár - Developer

### Want to join?

The FuelPHP development team is always looking for new team members, who are willing
to help lift the framework to the next level, and have the commitment to not only
produce awesome code, but also great documentation, and support to our users.

You can not apply for membership. Start by sending in pull-requests, work on outstanding
feature requests or bugs, and become active in the #fuelphp IRC channel. If your skills
are up to scratch, we will notice you, and will ask you to become a team member.

### Alumni

* Frank de Jonge - Developer ([http://frenky.net/](http://frenky.net/))
* Jelmer Schreuder - Developer ([http://jelmerschreuder.nl/](http://jelmerschreuder.nl/))
* Phil Sturgeon - Developer ([http://philsturgeon.co.uk](http://philsturgeon.co.uk))
* Dan Horrigan - Founder, Developer ([http://dhorrigan.com](http://dhorrigan.com))

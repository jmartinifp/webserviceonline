export class Config
{
    constructor(){
        //this.urlPastillas="http://localhost/epastillerojs/api.php";

        //this.urlPastillas="http://10.0.2.2:9876/pastillas";
        this.urlPastillas="http://localhost:9876/pastillas";

        //this.urlPastillas="https://webserviceepastillero.free.nf/pastillas.php";
        this.urlUsuario="http://localhost/epastillerojs/api2.php";

    }
    getUrlPastillas(){
        return this.urlPastillas;
    }
    getUrlUsuario(){
        return this.urlUsuario;
    }
}
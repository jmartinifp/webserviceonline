import { Config } from "../config/config.js";
import { PastillasViewModel } from "./viewmodels/pastillasviewmodel.js";

const conf= new Config();
const urlPastilla=conf.getUrlPastillas();
const pvm= new PastillasViewModel();
const datos= await pvm.cargarPastillas(urlPastilla);
pvm.render(datos);

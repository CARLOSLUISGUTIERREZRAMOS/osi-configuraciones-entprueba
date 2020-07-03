<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class tedefController extends Controller {

    private $rucCentroMedicoOsi;
    private $fecGeneracion;

    public function __construct() {
        $this->rucCentroMedicoOsi   = '20431738806';
        $this->fecGeneracion        = date('Ymd');
        $this->horaEnvio            = date('His');
    }
    
    /**
     * crearArchivoTedef
     *
     * Proceso principal que recibe parametros para
     * crear un lote específico.
     * @author Carlos Gutiérrez <carlos5t@hotmail.com>
     * @param string $numCodIpress  Número de iregistro otorgado 
     *                              por SUSALUD del código RENIPRESS vigente.
     * @param string $numCodIafas   Código de la IAFAS asignado por SUSALUD a 
     *                              las aseguradoras.
     * @param int    $numlote       Número de Lote.
     * @param string $desPeriodo    Periodo al cual corresponden los documentos
     *                              de facturación considerados contablemente en
     *                              el mes reportado.
     * @return txt
     */
    public function crearArchivoTedef () 
    {
        $tipoArchivo    = [0 => 'dfac', 1 => 'date', 2 => 'dser']; // 0 Factura | 1 Atencion | 2 Servicio
        $numCodIpress   = '00009783'; // Cod. IPRESS OSI-Miraflores
        $numCodIafas    = '20002'; // Cod IAFA Pacifico Seguros
        $numLote        = '0054780';
        $fecPeriodo     = '202006';

        $nomArchivoEstandarTransmisionElectronica   = 'dfac' 
                                                    . '_' . $this->rucCentroMedicoOsi 
                                                    . '_' . $numCodIpress
                                                    . '_' . $numCodIafas
                                                    . '_' . $numLote
                                                    . '_' . $fecPeriodo
                                                    . '_' . $this->fecGeneracion;

        Storage::disk('local')->put($nomArchivoEstandarTransmisionElectronica.'.txt', 'Aqui debería ir la trama..');
    }


    /**
     * crearArchivoTedef
     *
     * Proceso que genera la cabecera del documento facturador
     * @author Carlos Gutiérrez <carlos5t@hotmail.com>
     * @param string $numCodIpress  Número de registro otorgado 
     *                              por SUSALUD del código RENIPRESS vigente.
     * @return object
     */
    public function crearCabeceraDocumentoFacturador($numLote)
    {
        $this->horaEnvio;
    }
}

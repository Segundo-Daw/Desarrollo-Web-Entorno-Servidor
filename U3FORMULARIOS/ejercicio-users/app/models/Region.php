<?php
enum Region: String{
    case andalucia = 'Andalucía';
    case aragon = 'Aragón';
    case asturias = 'Asturies';
    case baleares = 'Illes Balears';
    case canarias = 'Canarias';
    case cantabria = 'Cantabria';
    case castilla_leon = 'Castilla y León';
    case castilla_mancha = 'Castilla-La Mancha';
    case cataluna = 'Catalunya';
    case extremadura = 'Extremadura';
    case galicia = 'Galiza';
    case madrid = 'Madrid';
    case murcia = 'Murcia';
    case navarra = 'Nafarroa';
    case pais_vasco = 'Euskadi';
    case rioja = 'La Rioja';
    case valencia = 'País Valencià';
    case ceuta = 'Ceuta';
    case melilla = 'Melilla';

    //Método para buscar por nombre del case
    public static function fromCaseName(string $caseName):?self{
        $caseName = strtolower($caseName);
        foreach(self::cases()as $case){
            if(strtolower($case->name)=== $caseName){
                return $case;
            }
        }
        return null;
    }
}

<?php

/**
 * Calcula la media de un array de notas.
 * @param array $notas Array con valores numéricos de las notas.
 * @return float La media redondeada a 2 decimales.
 */
function calcularMedia($notas) {
    // Usamos array_sum y count para el cálculo
    if (!is_array($notas) || count($notas) === 0) {
        return 0;
    }
    return round(array_sum($notas) / count($notas), 2);
}

/**
 * Encuentra el alumno con la nota más alta.
 * @param array $notas Array asociativo alumno => nota.
 * @return string Nombre del alumno con la nota más alta.
 */
function alumnoTop($notas) {
    if (!is_array($notas) || empty($notas)) {
        return "";
    }
    $maxNota = max($notas); // función PHP para máximo
    return array_search($maxNota, $notas); // devuelve el nombre del alumno
}

/**
 * Encuentra los alumnos con la nota más baja.
 * @param array $notas Array asociativo alumno => nota.
 * @return array Array con nombres de los alumnos con la nota más baja.
 */
function peorNota($notas) {
    if (!is_array($notas) || empty($notas)) {
        return "";
    }
    $maxNota = min($notas); // función PHP para el mínimo
    return array_search($maxNota, $notas); // devuelve el nombre del alumno
}
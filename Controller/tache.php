<?php
require '../config.php';
include_once '../Model/crud.php';
class TicketC
{
    function listTickets()
    {
        $sql = 'SELECT * FROM ticket_inter' ;
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function deleteTicket($IDT)
    {
        $sql = 'DELETE FROM ticket_intervention WHERE IDT=:IDT';
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':IDT', $IDT);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function addTicket($ticket)
    {
        $sql = "INSERT INTO ticket_inter (IDT, IDU, sujet, statut_ticket, priorite) 
                VALUES (:IDT, :IDU, :sujet, :statut, :priorite)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IDT' => $ticket->getIDT(),
                'IDU' => $ticket->getIDU(),
                'sujet' => $ticket->getSujet(),
                'statut' => $ticket->getStatutTicket(),
                'priorite' => $ticket->getPriorite()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function showTicket($IDT)
    {
        $sql = 'SELECT * FROM ticket_inter WHERE IDT=:IDT';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['IDT'=> $IDT]);
            $ticket = $query->fetch();
            return $ticket;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateTicket($ticket, $IDT)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE ticket_inter SET 
                    IDU = :IDU, 
                    sujet = :sujet, 
                    statut_ticket = :statut, 
                 
                    priorite = :priorite
                WHERE IDT = :IDT"
            );

            $query->execute([
                'IDT' => $IDT,
                'IDU' => $ticket-> getIDU(),
                'sujet' => $ticket->getSujet(),
                'statut' => $ticket->getStatutTicket(),
                'priorite' => $ticket->getPriorite()
                
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
}?>
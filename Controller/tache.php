<?php
include_once '../../config.php';
include_once '../../Model/crud.php';
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
        $sql = 'DELETE FROM ticket_inter WHERE IDT=:IDT';
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
        $sql = "INSERT INTO ticket_inter (IDT, IDU, NomPrenom ,email, phone, sujet, statut_ticket, priorite) 
                VALUES (:IDT, :IDU, :NomPrenom , :email, :phone, :sujet, :statut, :priorite)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IDT' => $ticket->getIDT(),
                'IDU' => $ticket->getIDU(),
                'NomPrenom' => $ticket->getNP(),
                'email' => $ticket->getemail(),
                'phone' => $ticket->getphone(),
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
    function listTicketsByStatus($statusFilter)
{
    try {
        $db = config::getConnexion();
        $sql = 'SELECT * FROM ticket_inter';

        if (!empty($statusFilter)) {
            $sql .= ' WHERE statut_ticket = :statut';
        }

        $query = $db->prepare($sql);

        if (!empty($statusFilter)) {
            $query->bindParam(':statut', $statusFilter);
        }

        $query->execute();
        $tickets = $query->fetchAll();

        return $tickets;
    } catch (PDOException $e) {
        // Vous pouvez gérer l'erreur de différentes manières
        // Par exemple, journaliser l'erreur ou la renvoyer pour la traiter ailleurs
        throw new Exception('Erreur lors de la récupération des tickets: ' . $e->getMessage());
    }
}
}?>
<form id="cursoAulaResponderForm" role="form">
    <div class="modal-header">
        <h5 class="modal-title" id="cursoAulaResponderModalLabel">Curso Aula / Responder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="0">
        <div class="row">
            <p>Data avaliação: 10/08/2024</p>
            <p>Nome do aluno: Jossana Luz</p>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Nota de Alunos</label>
                <div class="btn-group me-2 grid gap-1" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary">1</button>
                    <button type="button" class="btn btn-secondary">2</button>
                    <button type="button" class="btn btn-secondary">3</button>
                    <button type="button" class="btn btn-secondary">4</button>
                    <button type="button" class="btn btn-secondary">5</button>
                    <button type="button" class="btn btn-secondary">6</button>
                    <button type="button" class="btn btn-secondary">7</button>
                    <button type="button" class="btn btn-secondary">8</button>
                    <button type="button" class="btn btn-secondary">9</button>
                    <button type="button" class="btn btn-secondary">10</button>
                </div>
            </div>
            <div class="form-group">
                <label for="texto" class="control-label">Mensagem do Aluno: </label>
                <textarea class="form-control" name="texto" id="texto" rows="8"></textarea>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="bi bi-door-closed"></i>
            Fechar
        </button>
        {{-- <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar</button> --}}
    </div>
</form>

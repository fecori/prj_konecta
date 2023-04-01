        </div>
        <!-- Main Container -->
    </div>
    <!--End of Wrapper -->
    <script>
        $(document).ready( function () {
            $('#lista-productos').DataTable({
                paging: false,
                searching: false,
                rowReorder: true,
                columnDefs: [
                    { orderable: true, className: 'reorder', targets: [6, 7] },
                    { orderable: false, targets: '_all' }
                ]
            });
        } );
    </script>
</body>
</html>
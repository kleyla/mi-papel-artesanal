<script>
    const base_url = "<?= base_url(); ?>";
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php if (array_key_exists("script", $data)) { ?>
    <script src="<?= base_url(); ?>Views/<?= $data['script']; ?> "></script>
<?php } ?>
</body>

</html>
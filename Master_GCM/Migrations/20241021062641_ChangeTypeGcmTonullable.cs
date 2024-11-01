using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class ChangeTypeGcmTonullable : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AlterColumn<string>(
                name: "TYPEGCM",
                table: "MST_GCM",
                type: "text",
                nullable: true,
                oldClrType: typeof(string),
                oldType: "text");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AlterColumn<string>(
                name: "TYPEGCM",
                table: "MST_GCM",
                type: "text",
                nullable: false,
                defaultValue: "",
                oldClrType: typeof(string),
                oldType: "text",
                oldNullable: true);
        }
    }
}
